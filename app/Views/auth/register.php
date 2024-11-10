<?php $this->extend('layout') ?>

<?= $this->section('page_title') ?>
Register
<?= $this->endSection() ?>

<?php $this->section('content') ?>
<section class=" bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-2 text-2xl font-semibold  text-white">
            <img class="w-44" src="/assets/logo3.svg" alt="logo">
        </a>
        <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="">
                    <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white text-center mb-4">
                        Create an account
                    </h1>
                    <?php if (session()->getFlashdata('errors')): ?>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <div class="flex items-center text-sm text-red-400 rounded-lg" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div class="flex items-center justify-center">
                                    <span class="font-medium"><?= esc($error); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <form method="post" class="space-y-4 md:space-y-5" action="/auth/register">
                    <?= csrf_field() ?>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium  text-white">Username</label>
                        <input type="text" name="username" id="username" class=" border  text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Username" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-white">Email</label>
                        <input type="email" name="email" id="email" class=" border  text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class=" border  text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" required="">
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium  text-white">Confirm password</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class=" border  text-sm rounded-lg   block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" required="">
                    </div>
                    <button type="submit" class="w-full text-black  focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">Create an account</button>
                    <p class="text-sm font-light  text-gray-400">
                        Already have an account? <a href="<?= base_url('/auth/login'); ?>" class="font-medium  hover:underline text-primary-500">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>