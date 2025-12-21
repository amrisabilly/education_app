<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');

        // System prompt untuk konteks education
        $systemPrompt = "Kamu adalah asisten pembelajaran AI yang membantu siswa dalam bidang pendidikan. 
        Kamu membantu menjawab pertanyaan tentang berbagai mata pelajaran, memberikan tips belajar, 
        menjelaskan konsep-konsep pendidikan, dan memotivasi siswa untuk belajar lebih baik. 
        Jawab dengan bahasa Indonesia yang mudah dipahami, ramah, dan mendukung.";

        try {
            // Simulasi respons AI (replace dengan actual API call)
            // Untuk production, gunakan OpenAI API atau Gemini API
            $response = $this->getAIResponse($userMessage, $systemPrompt);

            return response()->json([
                'success' => true,
                'message' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, terjadi kesalahan. Silakan coba lagi.'
            ], 500);
        }
    }

    private function getAIResponse($userMessage, $systemPrompt)
    {
        // Cek apakah ada API key untuk OpenAI atau Gemini
        $openaiKey = env('OPENAI_API_KEY');
        $geminiKey = env('GEMINI_API_KEY');

        if ($openaiKey) {
            return $this->getOpenAIResponse($userMessage, $systemPrompt, $openaiKey);
        } elseif ($geminiKey) {
            return $this->getGeminiResponse($userMessage, $systemPrompt, $geminiKey);
        } else {
            // Fallback response jika tidak ada API key
            return $this->getFallbackResponse($userMessage);
        }
    }

    private function getOpenAIResponse($message, $systemPrompt, $apiKey)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->timeout(30)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $message]
            ],
            'temperature' => 0.7,
            'max_tokens' => 500,
        ]);

        if ($response->successful()) {
            return $response->json()['choices'][0]['message']['content'];
        }

        throw new \Exception('API Error');
    }

    private function getGeminiResponse($message, $systemPrompt, $apiKey)
    {
        $response = Http::timeout(30)->post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key={$apiKey}",
            [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $systemPrompt . "\n\nPertanyaan: " . $message]
                        ]
                    ]
                ]
            ]
        );

        if ($response->successful()) {
            $data = $response->json();
            return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Tidak ada respons';
        }

        throw new \Exception('API Error');
    }

    private function getFallbackResponse($message)
    {
        $originalMessage = $message;
        $message = strtolower($message);

        // Expanded response patterns dengan lebih banyak keyword dan konteks
        $patterns = [
            // Greetings
            [
                'keywords' => ['halo', 'hai', 'hi', 'hello', 'hey'],
                'response' => 'Halo! 👋 Saya adalah asisten pembelajaran AI. Ada yang bisa saya bantu tentang pelajaran Anda hari ini?'
            ],

            [
                'keywords' => ['apa kabar', 'kabar', 'gimana'],
                'response' => 'Baik sekali! Terima kasih sudah bertanya. Saya siap membantu Anda belajar hari ini. Ada topik apa yang ingin kita bahas?'
            ],

            // Thanks
            [
                'keywords' => ['terima kasih', 'makasih', 'thanks', 'thank you'],
                'response' => 'Sama-sama! 😊 Senang bisa membantu. Jangan ragu untuk bertanya lagi kapan saja ya!'
            ],

            // Matematika
            [
                'keywords' => ['matematika', 'math', 'mtk', 'aljabar', 'geometri', 'kalkulus', 'trigonometri', 'hitung'],
                'response' => "📐 Matematika adalah ilmu yang sangat penting! Saya bisa membantu dengan:\n\n• Aljabar dan persamaan\n• Geometri dan bangun ruang\n• Statistika dan probabilitas\n• Kalkulus\n• Aritmatika dasar\n\nTopik mana yang ingin kita pelajari?"
            ],

            // Fisika
            [
                'keywords' => ['fisika', 'physics', 'gaya', 'energi', 'gerak', 'listrik', 'magnet'],
                'response' => "⚡ Fisika mempelajari fenomena alam! Topik populer:\n\n• Mekanika (gerak, gaya, energi)\n• Listrik dan magnetisme\n• Gelombang dan optik\n• Termodinamika\n• Fisika modern\n\nAda yang ingin ditanyakan?"
            ],

            // Kimia
            [
                'keywords' => ['kimia', 'chemistry', 'atom', 'molekul', 'reaksi', 'unsur'],
                'response' => "🧪 Kimia sangat menarik! Saya bisa bantu dengan:\n\n• Struktur atom dan tabel periodik\n• Ikatan kimia\n• Reaksi kimia dan stoikiometri\n• Asam basa\n• Kimia organik\n\nMau belajar topik apa?"
            ],

            // Biologi
            [
                'keywords' => ['biologi', 'biology', 'sel', 'dna', 'genetika', 'ekosistem', 'evolusi'],
                'response' => "🔬 Biologi mempelajari kehidupan! Topik yang bisa kita bahas:\n\n• Sel dan jaringan\n• Genetika dan DNA\n• Sistem tubuh manusia\n• Ekologi dan lingkungan\n• Evolusi\n\nTertarik dengan topik apa?"
            ],

            // Bahasa Indonesia
            [
                'keywords' => ['bahasa indonesia', 'indo', 'ejaan', 'kalimat', 'paragraf', 'puisi'],
                'response' => "📖 Bahasa Indonesia penting untuk komunikasi! Bisa bantu dengan:\n\n• Tata bahasa dan EYD\n• Menulis paragraf dan esai\n• Analisis teks\n• Sastra dan puisi\n• Kosakata\n\nApa yang ingin dipelajari?"
            ],

            // Bahasa Inggris
            [
                'keywords' => ['bahasa inggris', 'english', 'grammar', 'vocabulary', 'tenses'],
                'response' => "🇬🇧 English is fun! I can help with:\n\n• Grammar dan tenses\n• Vocabulary building\n• Reading comprehension\n• Writing skills\n• Speaking practice\n\nWhich topic interests you?"
            ],

            // Sejarah
            [
                'keywords' => ['sejarah', 'history', 'perang', 'kemerdekaan', 'kerajaan'],
                'response' => "🏛️ Sejarah mengajarkan kita tentang masa lalu! Topik:\n\n• Sejarah Indonesia\n• Sejarah dunia\n• Peradaban kuno\n• Perang dunia\n• Tokoh-tokoh penting\n\nMau belajar periode apa?"
            ],

            // Geografi
            [
                'keywords' => ['geografi', 'geography', 'peta', 'iklim', 'bumi', 'negara'],
                'response' => "🌍 Geografi mempelajari Bumi dan isinya! Bisa bahas:\n\n• Peta dan globe\n• Iklim dan cuaca\n• Negara dan benua\n• Sumber daya alam\n• Demografi\n\nAda yang ingin ditanyakan?"
            ],

            // Tips Belajar
            [
                'keywords' => ['cara belajar', 'tips belajar', 'belajar efektif', 'metode belajar', 'belajar'],
                'response' => "📚 Tips belajar efektif:\n\n1. ⏰ Buat jadwal belajar rutin\n2. 🎯 Fokus pada satu topik\n3. ✍️ Latihan soal rutin\n4. 😴 Istirahat cukup\n5. 👥 Diskusi dengan teman\n6. 📝 Buat catatan sendiri\n7. 🎧 Cari suasana nyaman\n\nButuh tips lebih spesifik untuk mata pelajaran tertentu?"
            ],

            // Motivasi
            [
                'keywords' => ['motivasi', 'semangat', 'menyerah', 'lelah', 'capek', 'sulit'],
                'response' => "💪 Tetap semangat! Remember:\n\n• Setiap kesulitan adalah peluang untuk tumbuh\n• Kesuksesan butuh proses dan kesabaran\n• Kegagalan adalah guru terbaik\n• Kamu lebih kuat dari yang kamu kira!\n\n\"The expert in anything was once a beginner\" 🌟\n\nAyo kita hadapi tantangan ini bersama!"
            ],

            // Ujian/Test
            [
                'keywords' => ['ujian', 'test', 'ulangan', 'tes', 'exam'],
                'response' => "📝 Tips menghadapi ujian:\n\n1. Mulai belajar jauh hari\n2. Buat rangkuman materi\n3. Latihan soal tahun lalu\n4. Tidur cukup sebelum ujian\n5. Sarapan bergizi\n6. Baca soal dengan teliti\n7. Kerjakan yang mudah dulu\n\nSemangat untuk ujianmu! 🎯"
            ],

            // PR / Tugas
            [
                'keywords' => ['pr', 'tugas', 'homework', 'pekerjaan rumah'],
                'response' => "✏️ Ada tugas yang perlu dikerjakan? Saya bisa bantu:\n\n• Jelaskan topik atau soalnya\n• Saya akan bantu memahami konsepnya\n• Berikan panduan langkah-langkah\n• Tips mengerjakan lebih efektif\n\nCoba ceritakan tugasnya seperti apa?"
            ],
        ];

        // Cek setiap pattern
        foreach ($patterns as $pattern) {
            foreach ($pattern['keywords'] as $keyword) {
                if (str_contains($message, $keyword)) {
                    return $pattern['response'];
                }
            }
        }

        // Jika tidak ada keyword yang cocok, berikan respons yang lebih interaktif
        return "Terima kasih atas pertanyaan Anda tentang: \"" . $originalMessage . "\"\n\n" .
            "Saya adalah asisten pembelajaran AI yang siap membantu! 🤖\n\n" .
            "Saya bisa membantu dengan:\n\n" .
            "📚 **Mata Pelajaran:**\n" .
            "• Matematika, Fisika, Kimia, Biologi\n" .
            "• Bahasa Indonesia & Inggris\n" .
            "• Sejarah, Geografi, dll\n\n" .
            "✨ **Pembelajaran:**\n" .
            "• Penjelasan konsep\n" .
            "• Tips & strategi belajar\n" .
            "• Motivasi belajar\n" .
            "• Persiapan ujian\n\n" .
            "Coba tanyakan dengan lebih spesifik, misalnya:\n" .
            "\"Bagaimana cara belajar matematika?\"\n" .
            "\"Jelaskan tentang fotosintesis\"\n" .
            "\"Tips menghadapi ujian\"";
    }
}
