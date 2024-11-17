<?= $this->extend('layout') ?>
<?= $this->section('page_title') ?>
Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('navbar') ?>
<main class="container mx-auto px-4 py-8">
  <?php if (!empty($blogs)): ?>
    <?php foreach ($blogs as $blog): ?>
      <?= view('blogs', ['blog' => $blog]) ?>
    <?php endforeach; ?>
  <?php else: ?>
    <p>No blogs available.</p>
  <?php endif; ?>
  <div class="fixed bottom-10 right-8">
    <button
      onclick="window.location.href='<?= base_url('blog/create') ?>'"
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
</main>

<?= $this->endSection() ?>