<?php

?>

<html>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="/packages/toastify-js/toastify-js.css">
<script src="/packages/toastify-js/toastify-js.js"></script>
<script src="/packages/toast/toast.js"></script>
<script src="/utils/handleImageUpload.js"></script>
<script>
function resetPassword() {
    fetch(
        `${window.location.origin}/api/account/reset/password`, {
            headers: {
                'Content-Type': 'application/json'
            },
            method: "POST",
            body: JSON.stringify({
                password: document.getElementById('password').value,
                password_confirm: document.getElementById('passwordConfirm').value
            })
        }).then(async (res) => {
        if (res.ok) {
            document.getElementById('errorWrapper').classList.add('hidden');
            document.getElementById('successMessage').innerHTML = (await res.json())?.msg;
            document.getElementById('success').classList.remove('hidden');
            setTimeout(() => {
                window.location = "/login";
            }, 3000);
        } else {
            document.getElementById('success').classList.add('hidden');
            document.getElementById('error').innerHTML = (await res.json())?.msg;
            document.getElementById('errorWrapper').classList.remove('hidden');
        }
    }).then((res) => {}).catch((res) => {});
}
</script>
<header>
    <title>Reset password - Festival</title>
    <link rel="stylesheet" href="../styles/globals.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta property="og:title" content="Login - The Festival" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://the-festival-haarlem.000webhostapp.com/" />
    <meta property="og:image" itemProp="image" content="/og_image.png" />
    <meta property="og:description" content="" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="icon" type="image/png" href="/favicon.ico" />
    <link rel="manifest" href="/site.webmanifest" />
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
</header>

<body>
    <div class="">
        <?php include __DIR__ . '/../../components/nav.php' ?>
        <div class="h-[80vh] flex justify-center items-center mt-32">
            <div class="max-w-xl">

                <div
                    class="w-80 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-xl xl:p-0 dark:bg-teal-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Reset Password</h1>
                        <div class="bg-red-200 p-2 w-full rounded-lg flex text-red-700 items-center text-sm hidden"
                            id="errorWrapper"><svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <p id="error"></p>
                        </div>
                        <input type="hidden" id="token" name="token" value="<? echo $_GET['token'] ?>">
                        <div class="mb-4">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter your new password" required>
                        </div>
                        <div class="mb-4">
                            <label for="passwordConfirm"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm new
                                Password</label>
                            <input type="password" name="passwordConfirm" id="passwordConfirm"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Re-type Password" required>
                        </div>
                        <div class="bg-green-200 p-2 w-full rounded-lg flex text-green-700 items-center text-sm hidden"
                            id="success">

                            <p id="successMessage"></p>
                        </div>
                        <div class="mt-4">
                            <button onclick="resetPassword()" type="submit"
                                class="border border-white w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Reset
                                Password</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>