<template>
<!-- component -->
<div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3 cover-panel">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-4xl font-bold text-white">Olá Programador</h2>
                        
                        <p class="max-w-xl mt-3 text-gray-300">Esse é um lugar para você documentar seus projetos de desenvolvimento. </p>
                    </div>
                </div>
            </div>
         
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white">Login</h2>
                        
                        <p class="mt-3 text-gray-500 dark:text-gray-300">Entre para acessar sua conta</p>
                    </div>

                    <div class="mt-8">
                        <form id="form-login" @submit="login">
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email</label>
                                <input type="email" name="email" id="email" v-model="email" placeholder="example@example.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Senha</label>
                                    <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Esqueceu sua senha?</a>
                                </div>

                                <input type="password" name="password" id="password" v-model="password" placeholder="Sua senha" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="mt-6">
                               
                                <button
                                    type="submit"
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Entrar
                                </button>
                            </div>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Não tem uma conta? <a href="#" class="text-blue-500 focus:outline-none focus:underline hover:underline">Cre uma</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: null,
            password: null
        }
    },
    methods: {
        async login(e) {
            e.preventDefault();
            const data = {
                email: this.email,
                password: this.password
            }
           
            const dataJson = JSON.stringify(data);
            const req = await fetch('http://127.0.0.1:8000/api/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: dataJson,
            });

            const resp = await req.json();
            console.log(resp);
        } 
    }
}
</script>

<style>
.cover-panel {
    background-image: url("../../public/img/kevin-barnard-ro43ylaUQSc-unsplash.jpg");
}
</style>

