<?php require("./template/header.php"); ?>
<?php include("./template/sidebar.php"); ?>

<body>
    <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="/product-create-list.php">
                Manage Customer
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </li>

    </ol>
    <hr class=" border-gray-300 my-4">
    <form action="./product-store.php" class="flex flex-col gap-2" method="post">
        <div class=" flex  ">
            <label for="" class=" w-3/12 ">Barcode: </label>
            <input type="number" name="barcode" class="py-3  px-4 w-8/12 block border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="barcode" required>

        </div>
        <div class="flex ">
            <label for="" class=" w-3/12">Product name: </label>
            <input type="text" name="name" class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="product name" required>

        </div>
        <div class="flex ">
            <label for="" class=" w-3/12">Price: </label>
            <input type="number" name="price" class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="price" required>

        </div>
        <div class="flex ">
            <label for="" class=" w-3/12"> In Stock: </label>
            <input type="number" name="stock" class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="stock" required>

        </div>

        <button class="py-3 text-center self-center justify-center w-[50%] px-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Add</button>




    </form>




  





    <?php include("./template/footer.php"); ?>