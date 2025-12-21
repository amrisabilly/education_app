<!-- Chatbot Widget -->
<div x-data="chatbot()" class="fixed bottom-6 right-6 z-50">
    <!-- Chat Button -->
    <button @click="toggleChat"
        class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-2xl transition transform hover:scale-110"
        :class="{ 'hidden': isOpen }">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
    </button>

    <!-- Chat Window -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-4"
        class="bg-white rounded-lg shadow-2xl w-96 h-[600px] flex flex-col" style="display: none;">

        <!-- Header -->
        <div
            class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4 rounded-t-lg flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-white rounded-full p-2 mr-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold">Asisten Pembelajaran AI</h3>
                    <p class="text-xs text-blue-100">Online - Siap Membantu</p>
                </div>
            </div>
            <button @click="toggleChat" class="hover:bg-blue-800 rounded-full p-1 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Messages Container -->
        <div class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50" x-ref="messagesContainer">
            <!-- Welcome Message -->
            <div class="flex items-start">
                <div class="bg-blue-600 rounded-full p-2 mr-2 flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div class="bg-white rounded-lg p-3 shadow-sm max-w-[75%]">
                    <p class="text-sm text-gray-800">Halo! Saya adalah asisten pembelajaran AI. Saya siap membantu Anda
                        dengan pertanyaan seputar pendidikan. Silakan tanyakan apa saja! 😊</p>
                </div>
            </div>

            <!-- Dynamic Messages -->
            <template x-for="(msg, index) in messages" :key="index">
                <div :class="msg.isUser ? 'flex justify-end' : 'flex items-start'">
                    <div x-show="!msg.isUser" class="bg-blue-600 rounded-full p-2 mr-2 flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <div :class="msg.isUser ? 'bg-blue-600 text-white' : 'bg-white text-gray-800'"
                        class="rounded-lg p-3 shadow-sm max-w-[75%]">
                        <p class="text-sm whitespace-pre-wrap" x-text="msg.text"></p>
                    </div>
                </div>
            </template>

            <!-- Loading Indicator -->
            <div x-show="isLoading" class="flex items-start">
                <div class="bg-blue-600 rounded-full p-2 mr-2">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div class="bg-white rounded-lg p-3 shadow-sm">
                    <div class="flex space-x-2">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s">
                        </div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="border-t border-gray-200 p-4 bg-white rounded-b-lg">
            <form @submit.prevent="sendMessage" class="flex space-x-2">
                <input type="text" x-model="inputMessage" :disabled="isLoading"
                    placeholder="Ketik pertanyaan Anda..."
                    class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    autocomplete="off">
                <button type="submit" :disabled="!inputMessage.trim() || isLoading"
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-2 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function chatbot() {
        return {
            isOpen: false,
            isLoading: false,
            inputMessage: '',
            messages: [],

            toggleChat() {
                this.isOpen = !this.isOpen;
            },

            async sendMessage() {
                if (!this.inputMessage.trim()) return;

                const userMessage = this.inputMessage.trim();

                // Add user message
                this.messages.push({
                    text: userMessage,
                    isUser: true
                });

                this.inputMessage = '';
                this.isLoading = true;
                this.scrollToBottom();

                try {
                    const response = await fetch('{{ route('siswa.chatbot') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            message: userMessage
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        this.messages.push({
                            text: data.message,
                            isUser: false
                        });
                    } else {
                        this.messages.push({
                            text: 'Maaf, terjadi kesalahan. Silakan coba lagi.',
                            isUser: false
                        });
                    }
                } catch (error) {
                    this.messages.push({
                        text: 'Maaf, terjadi kesalahan koneksi. Silakan coba lagi.',
                        isUser: false
                    });
                } finally {
                    this.isLoading = false;
                    this.scrollToBottom();
                }
            },

            scrollToBottom() {
                this.$nextTick(() => {
                    const container = this.$refs.messagesContainer;
                    container.scrollTop = container.scrollHeight;
                });
            }
        }
    }
</script>

<style>
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-0.5rem);
        }
    }

    .animate-bounce {
        animation: bounce 1s infinite;
    }
</style>
