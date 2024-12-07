<?php $this->extend('layout') ?>
<?= $this->section('page_title') ?>
Login
<?= $this->endSection() ?>
<?php $this->section('content') ?>
<section class="bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-2 text-2xl font-semibold  text-white">
            <img class="w-44" src="/assets/logo3.svg" alt="logo">
        </a>
        <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div>
                    <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl text-white text-center mb-4">
                        Login
                    </h1>
                    <?php if (session()->getFlashdata('errors')): ?>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <div class="flex text-sm text-red-400 rounded-lg" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium"> <?= esc($error); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="flex items-center text-sm text-green-400 rounded-lg" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium"> <?= session()->getFlashdata('success'); ?> </span> 
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <form method="post" class="space-y-4 md:space-y-6" action="/auth/login">
                    <?= csrf_field(); ?>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-white">Email</label>
                        <input name="email" id="email" class="border  rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="name@company.com">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class=" border  rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="flex items-center mb-2 text-sm text-red-400 rounded-lg" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Danger alert!</span> <?= session()->getFlashdata('error'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="flex items-center justify-between">
                        <a href="/auth/forgotPassword" class="text-sm font-medium  hover:underline text-primary-500">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full text-black   focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">Sign in</button>
                    <p class="text-sm font-light  text-gray-400">
                        Don’t have an account yet? <a href="/auth/register" class="font-medium hover:underline text-primary-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>