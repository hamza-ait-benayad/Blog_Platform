<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?= $this->include('navbar') ?>
<main class="container mx-auto px-8 py-24">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex justify-between items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="/assets/utilisateur.png" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold  text-white"><?= esc($blog['author']) ?></a>
                            <p class="text-base  text-gray-400"><?= esc($blog['category']) ?></p>
                            <p class="text-base  text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                    <?php
                                    $createdAt = new DateTime($blog['created_at']);
                                    $now = new DateTime();
                                    if ($createdAt->format('Y-m-d') == $now->format('Y-m-d'))
                                        echo $createdAt->format('H:i');
                                    elseif ($createdAt->format('Y') == $now->format('Y'))
                                        echo $createdAt->format('d M, H:i');
                                    else
                                        echo $createdAt->format('d M Y, H:i');
                                    ?>
                                </time></p>
                        </div>
                    </div>
                    <!-- manage blog -->
                        <?php if ($blog['user_id'] === session('user_id')): ?>
                    <div>
                        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center rounded-lg focus:ring-4 focus:outline-none text-white bg-gray-800 hover:bg-gray-700 focus:ring-gray-600" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                            </svg>
                        </button>
                        <div id="dropdownDotsHorizontal" class="z-10 hidden mt-2 absolute rounded-lg shadow w-44 bg-gray-700 divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-600 hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-600 hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-gray-200 hover:bg-gray-600 hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <a href="#" class="block px-4 py-2 text-sm  hover:bg-gray-600 text-gray-200 hover:text-white">Separated link</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight lg:mb-6 lg:text-4xl text-white"><?= esc($blog['title']); ?></h1>
            </header>
            <p><?= esc($blog['content']); ?></p>
            <section class="not-format">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-lg font-bold text-gray-300">Discussion (<?= esc($blog['NbComment']) ?>)</h2>
                </div>
                <form class="mb-6">
                    <div class="py-2 px-4 mb-4 rounded-lg rounded-t-lg bg-gray-800 ">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6"
                            class="px-0 w-full text-sm text-whiteborder-0 focus:ring-0 border-none  placeholder-gray-400 bg-gray-800"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-black bg-primary-500 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-900">
                        Post comment
                    </button>
                </form>
                <?php if (!empty($blog['comments'])): ?>
                    <h2>Comments</h2>
                    <ul>
                        <?php foreach ($blog['comments'] as $comment): ?>
                            <article class="p-6 mb-6 text-base rounded-lg bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-400"><img
                                                class="mr-2 w-6 h-6 rounded-full"
                                                src="/assets/utilisateur.png"
                                                alt="Michael Gough"><?= esc($comment['commenter']); ?></p>
                                        <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08"
                                                title="February 8th, 2022"><?= esc($comment['created_at']); ?></time></p>
                                    </div>
                                    <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                        class="inline-flex items-center p-2 text-sm font-medium text-center  rounded-lg ocus:ring-4 focus:outline-none  text-gray-400 bg-gray-900 hover:bg-gray-700 focus:ring-gray-600"
                                        type="button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                        </svg>
                                        <span class="sr-only">Comment settings</span>
                                    </button>
                                    <div id="dropdownComment1"
                                        class="hidden z-10 w-36 rounded divide-y shadow bg-gray-700 divide-gray-600">
                                        <ul class="py-1 text-sm  text-gray-200"
                                            aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4  hover:bg-gray-600 hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4  hover:bg-gray-600 hover:text-white">Remove</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4  hover:bg-gray-600 hover:text-white">Report</a>
                                            </li>
                                        </ul>
                                    </div>
                                </footer>
                                <p><?= esc($comment['comment']) ?></p>
                                <div class="flex items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="flex items-center font-medium text-sm  hover:underline text-gray-400">
                                        <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                                        </svg>
                                        Reply
                                    </button>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No comments yet.</p>
                <?php endif; ?>
            </section>
        </article>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownMenuIconButton = document.getElementById('dropdownMenuIconButton');
        const dropdownDotsHorizontal = document.getElementById('dropdownDotsHorizontal');
        
        dropdownMenuIconButton.addEventListener('click', function() {
            dropdownDotsHorizontal.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!dropdownMenuIconButton.contains(event.target)) {
                dropdownDotsHorizontal.classList.add('hidden');
            }
        });
    });
</script>
<?= $this->endSection() ?>