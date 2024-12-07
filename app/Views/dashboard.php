<?= $this->extend('layout') ?>
<?= $this->section('page_title') ?>
Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('navbar') ?>
<main class="pt-14">
  <div>
    <div class="flex justify-center mt-10">
      <?php if (session()->getFlashdata('errors')): ?>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
          <div class="flex text-sm text-red-400 rounded-lg" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium"><?= esc($error); ?></span>
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
    <div class="flex flex-row justify-center items-center ">
      <div
        class="fixed left-5 top-40 w-[25%] h-[70%] rounded-lg flex gap-5 text-gray-400">
        <div class="h-full w-1 bg-gray-400 rounded-lg">.</div>
        <div class="w-4/5">
          <h1 class="text-xl text-gray-200 font-bold text-center">Most Popular Blogs</h1>
          <hr class="border-gray-500 mt-2">
          <div>
            <?php if (!empty($popularBlogs)): ?>
              <?php foreach ($popularBlogs as $blog): ?>
                <div class="flex flex-row justify-between items-center gap-5 hover:bg-gray-800 mt-4 rounded-lg p-2 w-full">
                  <a href="<?= base_url('blogs/show/' . $blog['id']) ?>" class="flex justify-between w-full">
                    <div class="flex flex-col gap-1">
                      <h2 class="text-lg text-gray-300 font-bold"><?= $blog['title'] ?></h2>
                      <p class="text-sm text-gray-400"><strong>By:</strong> <?= $blog['author'] ?></p>
                    </div>
                    <div class="flex items-center gap-1">
                      <p class="text-sm text-gray-400"><?= $blog['comment_count'] ?> </p>
                      <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h1v2a1 1 0 0 0 1.707.707L9.414 13H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M8.023 17.215c.033-.03.066-.062.098-.094L10.243 15H15a3 3 0 0 0 3-3V8h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-1v2a1 1 0 0 1-1.707.707L14.586 18H9a1 1 0 0 1-.977-.785Z" clip-rule="evenodd" />
                      </svg>

                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="text-xl text-gray-400 font-bold">No popular blogs available.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="flex justify-center items-center flex-col">
        <?php if (!empty($blogs)): ?>
          <?php foreach ($blogs as $blog): ?>
            <?= view('blogs', ['blog' => $blog]) ?>
          <?php endforeach; ?>
          <div class="flex text-white flex-row my-4">
            <nav aria-label="Page navigation example">
              <ul class="inline-flex -space-x-px text-sm gap-2">
                <?php if ($pager->getCurrentPage() > 1): ?>
                  <li>
                    <a href="<?= $pager->getPreviousPageURI() ?>"
                      class="flex items-center justify-center px-4 h-10 text-sm font-medium border rounded-lg bg-gray-800 border-gray-700 text-white hover:bg-gray-700">
                      <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                      </svg>
                      Previous
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <span
                      class="flex items-center justify-center px-4 h-10 text-sm font-medium border rounded-lg bg-gray-800 border-gray-700 text-gray-600 ">
                      <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                      </svg>
                      Previous
                    </span>
                  </li>
                <?php endif; ?>
                <li>
                  <span class="flex items-center justify-center px-4 h-10 text-sm font-medium rounded-lg text-white bg-gray-800 border border-gray-700">
                    Page <?= $pager->getCurrentPage() ?> of <?= $pager->getPageCount() ?>
                  </span>
                </li>
                <?php if ($pager->getCurrentPage() < $pager->getPageCount()): ?>
                  <li>
                    <a href="<?= $pager->getNextPageURI() ?>"
                      class="flex items-center justify-center px-4 h-10 text-sm font-medium border rounded-lg bg-gray-800 border-gray-700 text-white hover:bg-gray-700">
                      Next
                      <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                      </svg>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <span
                      class="flex items-center justify-center px-4 h-10 text-sm font-medium border rounded-lg bg-gray-800 border-gray-700 text-gray-600 ">
                      Next
                      <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                      </svg>
                    </span>
                  </li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
        <?php else: ?>
          <div class="flex justify-center items-center mt-auto">
            <p class="text-xl text-gray-400 font-bold">No blogs available.</p>
          </div>
        <?php endif; ?>
      </div>

      <div class="fixed right-20 top-40 px-5 py-5 w-1/5 border border-gray-400 rounded-lg flex flex-col gap-5 text-center">
        <h2 class="text-2xl font-bold text-gray-400">Categories</h2>
        <hr>
        <ul action="" class=" flex gap-2 flex-col text-gray-400 justify-center">
          <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
              <a href="/byCategory/<?= $category['id'] ?>"
                class="hover:text-gray-800<?= current_url() == base_url('index.php/byCategory/' . $category['id']) ? ' bg-slate-300 text-black' : '' ?> hover:bg-slate-300 rounded-lg p-2 transition-all">
                <?= $category['name'] ?>
              </a>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No categories available.</li>
          <?php endif; ?>
        </ul>
      </div>

    </div>


    <div class="fixed bottom-10 right-8">
      <button
        onclick="window.location.href='<?= base_url('blogs/create') ?>'"
        class="group flex items-center justify-start w-16 h-16 bg-primary-500 rounded-full cursor-pointer relative pl-1 overflow-hidden transition-all duration-300 shadow-lg hover:w-48 active:translate-x-1 active:translate-y-1">
        <div
          class="flex items-center justify-center w-full transition-all duration-300 group-hover:justify-start group-hover:px-3">
          <svg class="w-10 h-10 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
          </svg>
        </div>
        <div
          class="absolute right-5 transform translate-x-full opacity-0 text-gray-900 text-xl font-semibold transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100">
          New Blog
        </div>
      </button>
    </div>
  </div>
</main>

<?= $this->endSection() ?>