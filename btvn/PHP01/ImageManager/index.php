<?php
session_start();
require_once __DIR__ . '/lib/flash.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        $imageDirectory = './uploads/';
        $images = scandir($imageDirectory);
        $nmbImages = count($images)-2;
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
        $num_results_on_page = 8;

        // Xóa ảnh
        if(isset($_POST["delete_image"])){
            $imageToDelete = $_POST["image_name"];
            unlink($imageDirectory.$imageToDelete);
            header('Location: index.php');
            echo "close_confirm_form();";
        }

        // Sửa tên ảnh
        if(isset($_POST["update_image_name"])){
            $newImageName = $_POST["new_image_name"];
            $oldImageName = $_POST["image_name"];

            $newImagePath = $imageDirectory.$newImageName;
            $oldImagePath = $imageDirectory.$oldImageName;

            if(rename($oldImagePath, $newImagePath)){
                header('Location: index.php');
                exit;
            }
            echo "close_edit_form();";
        }

    ?>
    <!--Title-->
    <div class="flex justify-center mt-8">
        <h1 class="text-3xl font-bold uppercase text-blue-600">Images Manager</h1>
    </div>

    <!-- Images Gallery-->
    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-8">
        <div class="flex justify-end">
                <button type="button" class="px-6 py-2 rounded border-2 border-green-500 bg-green-500
                text-white text-lg hover:bg-white hover:text-green-500 font-bold" onclick="open_upload_form()"> Thêm mới hình ảnh</button>
        </div>
        <div class="w-full mt-8">
            <div class="-m-1 flex flex-wrap md:-m-2">
                <?
                $images = array_slice($images, 2);
                $lastImageIndex = 8*($page);
                if($lastImageIndex > $nmbImages){
                    $lastImageIndex = $nmbImages;
                }
                $imagesOnPage = array_slice($images, 8*($page-1), $num_results_on_page);

                foreach ($imagesOnPage as $image) {
                    if ($image !== '.' && $image !== '..') {
                ?>
                <div class="flex w-1/4 flex-wrap">
                    <div class="w-full h-96 p-1 md:p-2">
                        <img
                            alt="gallery"
                            class="block h-full w-full rounded-lg object-cover object-center"
                            src="<?php echo $imageDirectory . $image ?>" />
                    </div>
                    <div class="w-full p-2 flex justify-between">
                        <div class="text-left pl-4 text-gray-500 text-lg">
                            <?php echo $image ?>
                        </div>
                        <div>
                            <div class="flex justify-end gap-2">
                                <div>
                                    <button type="button" onclick="edit_file_name('<?php echo $image?>')" class="text-lg text-blue-500 hover:text-black">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </div>
                                <div>
                                    <form id="deleteImageForm" method="post" action="">
                                        <input type="hidden" name="image_name" value="<?php echo $image?>" />
                                        <button type="button" name="delete_image" class="text-lg text-red-500 hover:text-black" onclick="open_confirm_window()">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium"><?php echo 8*($page-1)+1 ?></span>
                        to
                        <span class="font-medium"><?php echo $lastImageIndex ?></span>
                        of
                        <span class="font-medium"><?php echo $nmbImages ?></span>
                        results
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                        <?php if ($page > 1): ?>
                        <a href="index.php?page=<?php echo $page-1 ?>" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <?php endif; ?>

                        <?php if ($page < ceil($nmbImages / $num_results_on_page)): ?>
                            <a href="index.php?page=<?php echo $page+1 ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php endif; ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute w-full h-full bg-black/50 top-0 left-0 hidden" id="edit_form">
        <div class="flex justify-center items-center">
            <div class="w-1/3 bg-white p-8 mt-36 rounded">
                <div class="edit-form">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <img
                                    id="edit_image_src"
                                    alt="gallery"
                                    class="block h-full w-full rounded-lg object-cover object-center"
                                    src="./uploads/sample_1.png" />
                        </div>
                        <div class="col-span-1">
                            <form method="post" action="">
                                <h3 class="text-center font-bold text-blue-600 uppercase text-lg"> Sửa tên</h3>
                                <div class="mt-2 w-full">
                                    <p class="text-left font-bold text-base text-gray-600"> Tên cũ:</p>
                                    <input class="px-2 py-1 border border-gray-400 rounded w-full mt-1 focus:outline-blue-500"
                                           type="text" name="image_name" id="editImageName" value="sample_1.png" readonly/>
                                </div>

                                <div class="mt-2 w-full">
                                    <p class="text-left font-bold text-base text-gray-600"> Tên mới:</p>
                                    <input class="px-2 py-1 border border-gray-400 rounded w-full mt-1 focus:outline-blue-500"
                                           type="text" name="new_image_name" id="newImageName" value="sample_1.png" required/>
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="button" class="px-5 py-2 bg-gray-500 text-white text-base border border-gray-500
                                                       hover:text-gray-500 hover:bg-white rounded" onclick="close_edit_form()">Hủy</button>
                                    <button type="submit" class="px-5 py-2 bg-orange-500 text-white text-base border border-orange-500
                                                       hover:text-orange-500 hover:bg-white rounded ">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute w-full h-full bg-black/50 top-0 left-0 hidden" id="confirm_form">
        <div class="flex justify-center items-center">
            <div class="w-1/4 bg-white p-8 mt-48 rounded">
                <div class="confirm-form">
                    <div class="gap-4">
                        <div class="col-span-1">
                            <form method="post" action="">
                                <h3 class="text-center font-bold text-blue-600 uppercase text-lg">Xác nhận hành động</h3>
                                <div class="flex justify-center gap-2 mt-4">
                                    <button type="button" class="px-5 py-2 bg-gray-500 text-white text-base border border-gray-500
                                                       hover:text-gray-500 hover:bg-white rounded" onclick="close_confirm_form()">Quay lại</button>
                                    <button type="submit" class="px-5 py-2 bg-orange-500 text-white text-base border border-orange-500
                                                       hover:text-orange-500 hover:bg-white rounded " name="delete_image" form="deleteImageForm">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute w-full h-full bg-black/50 top-0 left-0 hidden" id="upload_form">
        <div class="flex justify-center items-center">
            <div class="w-1/2 bg-white p-8 mt-48 rounded">
                <div class="w-full upload-form">
                    <?php
                        flash('upload');
                    ?>

                    <form enctype="multipart/form-data" action="./upload.php" method="post">
                        <div>
                            <label for="file">Select a file:</label>
                            <input class="border-2 rounded" type="file" id="file" name="file"/>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <button type="button" class="px-5 py-2 bg-gray-500 text-white text-base border border-gray-500
                                                       hover:text-gray-500 hover:bg-white rounded" onclick="close_upload_form()">Hủy</button>
                            <button type="submit" class="px-5 py-2 bg-orange-500 text-white text-base border border-orange-500
                                                       hover:text-orange-500 hover:bg-white rounded ">Tải lên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let imgDir = '<?php echo $imageDirectory ?>';
        function edit_file_name(filename){
            console.log(filename);
            document.getElementById("edit_form").style.display="inline-block";
            document.getElementById("edit_image_src").src= imgDir + filename;
            document.getElementById("editImageName").value= filename;
            document.getElementById("newImageName").value= "";
        }
        function close_edit_form(){
            document.getElementById("edit_form").style.display="none";
        }
        function open_upload_form(){
            document.getElementById("upload_form").style.display="inline-block";
        }
        function close_upload_form(){
            document.getElementById("upload_form").style.display="none";
        }
        function open_confirm_window(){
            document.getElementById("confirm_form").style.display="inline-block";
        }
        function close_confirm_form(){
            document.getElementById("confirm_form").style.display="none";
        }
    </script>
</body>
</html>