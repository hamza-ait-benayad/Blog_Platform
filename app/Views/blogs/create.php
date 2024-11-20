<?php $this->extend('layout') ?>
<?= $this->section('page_title') ?>
Create Blog
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('navbar') ?>
<section class="container mx-auto px-4 py-8">
  <form action="<?= base_url('blogs/store') ?>" method="POST">
    <div class="flex flex-col justify-between gap-8 mt-10 bg-gray-800 p-10 rounded-md">
      <div class="text-center text-xl text-white font-bold">
        <h1>New Blog</h1>
      </div>
      <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-white">Title</label>
        <input type="text" id="first_name" name="title" class="border text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Blog Title" required />
      </div>
      <div>
        <label for="categorie" class="block mb-2 text-sm font-medium text-white">Categorie</label>
        <select id="categorie" name="category_id" class="border text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
          <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="">
        <label for="editor" class="block mb-2 text-sm font-medium text-white">Your article</label>
        <textarea id="editor" rows="8" name="content" class="border text-sm rounded-lg  block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Write an article..." required></textarea>
      </div>
      <div>
        <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-black bg-primary-800 rounded-lg focus:ring-4 focus:ring-primary-900 hover:bg-primary-900">
          Publish post
        </button>
      </div>
    </div>
  </form>
</section>
<?= $this->endSection() ?>