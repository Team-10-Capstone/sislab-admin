<?php $pager->setSurroundCount(2) ?>

<nav class="flex justify-end items-center space-x-2 rtl:space-x-reverse mt-5">
    <?php if ($pager->hasPrevious()): ?>
        <a class="w-10 h-10 bg-white dark:bg-black/20 text-gray-500 hover:bg-primary hover:text-white p-2 inline-flex justify-center text-sm font-medium items-center gap-2 rounded-full"
            href="<?= $pager->getFirst() ?>" aria-label="First">
            <span aria-hidden="true">««</span>
        </a>

        <a class="w-10 h-10 bg-white dark:bg-black/20 text-gray-500 hover:bg-primary hover:text-white p-2 inline-flex justify-center text-sm font-medium items-center gap-2 rounded-full"
            href="<?= $pager->getPrevious() ?>" aria-label="Previous">
            <span aria-hidden="true">«</span>
        </a>
    <?php endif; ?>

    <?php foreach ($pager->links() as $link): ?>
        <a class="w-10 h-10 bg-<?= $link['active'] ? 'primary text-white' : 'white dark:bg-black/20 text-gray-500' ?> p-2 inline-flex items-center justify-center text-sm font-medium rounded-full"
            href="<?= $link['uri'] ?>" aria-current="<?= $link['active'] ? 'page' : '' ?>">
            <?= $link['title'] ?>
        </a>
    <?php endforeach; ?>

    <?php if ($pager->hasNext()): ?>
        <a class="w-10 h-10 bg-white dark:bg-black/20 text-gray-500 hover:bg-primary hover:text-white p-2 inline-flex justify-center items-center text-sm font-medium items-center gap-2 rounded-full"
            href="<?= $pager->getNext() ?>" aria-label="Next">
            <span aria-hidden="true">»</span>
        </a>

        <a class="w-10 h-10 bg-white dark:bg-black/20 text-gray-500 hover:bg-primary hover:text-white p-2 inline-flex justify-center text-sm font-medium items-center gap-2 rounded-full"
            href="<?= $pager->getLast() ?>" aria-label="Last">
            <span aria-hidden="true">»»</span>
        </a>
    <?php endif; ?>
</nav>