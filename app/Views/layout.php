<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('page_title', true) ?></title>
    <link rel="icon" href="<?= base_url('favicon.svg') ?>" type="image/svg">
    <link href="<?= base_url(); ?>css/tailwind.output.css" rel="stylesheet">
</head>
<body class="bg-gray-900">
    <main>
    <?= $this->renderSection('content') ?>
    </main>
</body>
</html>