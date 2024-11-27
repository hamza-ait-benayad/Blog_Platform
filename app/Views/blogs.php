<main class="pt-8 bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
    <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue format-invert">
      <header class="mb-4 lg:mb-6 not-format">
        <address class="flex items-center mb-6 not-italic">
          <div class="inline-flex items-center mr-3 text-sm text-gray-900">
            <img class="mr-4 w-16 h-16 rounded-full" src="/assets/utilisateur.png" alt="Author">
            <div>
              <a href="#" rel="author" class="text-xl font-bold text-white"><?= esc($blog['author'] ?? 'Unknown Author'); ?></a>
              <p class="text-base text-gray-400"><?= esc($blog['category'] ?? ''); ?></p>
              <p class="text-base text-gray-400">
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
              </p>
            </div>
          </div>
        </address>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight lg:mb-6 lg:text-4xl text-white"><?= $blog['title'] ?></h1>
      </header>
      <body>
        <?php if ($blog['image_path'] !== NULL): ?>
          <img src="<?= base_url($blog['image_path']) ?>" alt="Blog Image" class="img-fluid">
        <?php endif; ?>
        <p class="text-xl font-medium"><?= esc($blog['content']); ?></p>
      </body>
      <footer class="mt-6 flex w-full justify-end items-center gap-5">
        <div class="flex items-center text-gray-500">
          <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <span><?= esc($blog['NbComment']); ?> comments</span>
        </div>
        <a href="<?= base_url('blogs/show/' . $blog['id']) ?>" class="text-blue-500">Read more</a>
      </footer>
      <hr>
    </article>
  </div>
</main>