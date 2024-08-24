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

    <div class=" flex flex-col gap-4 lg:flex-row ">

        <form action="./products-to-conter.php" class="flex print:hidden border-2 border-gray-700 p-5 flex-col gap-2" method="post">
            <div class=" flex  ">
                <label for="" class=" w-3/12 ">Barcode: </label>
                <input type="number" id="barcode" autofocus name="barcode" class="py-3 px-4 w-8/12 block border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="barcode" required>

            </div>
            <div class="flex ">
                <label for="" class=" w-3/12">Name: </label>
                <input type="text" id="productName" name="name" class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="product name" required>

            </div>
            <div class="flex ">
                <label for="" class=" w-3/12">Price: </label>
                <input type="number" id="productPrice" name="price" class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="price" required>

            </div>
            <div class="flex ">
                <label for="" class=" w-3/12">Quantity: </label>
                <input type="number" id="productQuantity" name="quantity" class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="quantity" required>

            </div>
            <div class="flex ">
                <label for="" class=" w-3/12">Available Quantity: </label>
                <input type="number" id="productStock" name="stock" class="py-3 px-4 block w-8/12 border border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="stock" required>

            </div>

            <button class="py-3 text-center self-center justify-center w-[50%] px-4 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Buy</button>




        </form>



        <div class=" p-5 border-2 border-black">
            <div>
                <button id="print" class="py-3 print:hidden text-center self-center justify-center  px-4 items-center gap-x-2 text-sm m-3 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Print</button>
                <?php
                $maxSql = "SELECT MAX(voucher_number) AS latest_bill from sold_products";
                $maxQuery = mysqli_query($conn,$maxSql);
                $maxRow = mysqli_fetch_assoc($maxQuery);

                $result = $maxRow["latest_bill"] + 1;
                


                ?>

                <form action="save-record.php" id="voucher-form" method="post">
                    <input type="hidden" name="voucher" value="<?= $result ?>">
                    <input type="hidden" id="paidBy" name="paid_by" value="cash">
                </form>
                

                <button onclick="document.getElementById('voucher-form').submit();" class="py-3 print:hidden text-center self-center justify-center  px-4 items-center gap-x-2 text-sm m-3 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" >Save and New Voucher</button>
                <h1 class=" text-right font-bold">V-<?= $result ?></h1>




            </div>
            <div>
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700 dark:shadow-gray-900">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead>
                                        <tr class="divide-x divide-gray-200 dark:divide-neutral-700">
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">Name</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">Quantity</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">Price</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">Cost</th>
                                            <th scope="col" class="px-6 py-3 text-end text-xs font-bold text-gray-900 uppercase dark:text-neutral-500">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                        <?php
                                        $sql = "SELECT * FROM products_at_conter";
                                        $sqlco = "SELECT SUM(cost) AS total FROM products_at_conter";
                                        $queryco = mysqli_query($conn, $sqlco);
                                        $totalRow = mysqli_fetch_assoc($queryco);
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($query)) :
                                        ?>
                                            <tr class=" divide-x divide-gray-200">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $row["name"] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row["quantity"] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row["price"] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row["cost"]  ?> </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                    <a href="./product-bill-delete.php?row_id=<?= $row["id"] ?>" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</a>
                                                </td>
                                            </tr>

                                        <?php endwhile; ?>


                                    </tbody>

                                    <tfoot>

                                        <tr class=" divide-x divide-gray-200">
                                            <td colspan="1" class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200">Paid By</td>
                                            <td colspan="1" class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200"><select name="paid_by" onchange="document.getElementById('paidBy').value = this.value" >
                                                <option value="cash">cash</option>
                                                <option value="kpay">Kpay</option>
                                            </select></td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200">Total</td>
                                            <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-neutral-200"><?= $totalRow["total"] ?></td>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    </main>

    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="./billing-app.js"></script>
</body>


</html>

<!-- <?php include("./template/footer.php"); ?> -->