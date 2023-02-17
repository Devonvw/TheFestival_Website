<?php 
/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}*/
?>
<html>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@6.0"></script>
<script>
window.addEventListener("load", (event) => {
    getUsers()
});

function deleteUser(id) {
    fetch(`${window.location.origin}/api/accounts?id=${id}`, {
        method: "DELETE",
    }).then(async (res) => {
        if (res.ok) getUsers();
    }).catch((res) => {});
}

function getUsers() {
    fetch(`${window.location.origin}/api/account/all`, {
        headers: {
            'Content-Type': 'application/json'
        },
        method: "GET",
    }).then(async (res) => {
        if (res.ok) {
            const data = await res.json();

            const dataTable = new simpleDatatables.DataTable("table", {
                data: {
                    headings: ["Id", "First name", "Last name", "Email", "Type", "Created At",
                        ""
                    ],
                    data: data.map(item => Object.values(item).filter((item) =>
                        item != null).concat([false])),

                },
                columns: [{
                    select: 6,
                    sortable: false,
                    render: (value, _td, _rowIndex, _cellIndex) =>
                        `<div class="ml-auto flex flex-row gap-x-2"><button class="bg-red-800 h-[1.7rem] flex items-center"><img src="../assets/icons8-trash-can-120.png" class="w-3/4 h-[1.5rem] mx-auto" />
</button><button class="bg-gray-800 h-[1.7rem] flex items-center"><img src="../assets/icons8-pencil-drawing-100.png" class="w-full scale-[0.80] h-[1.5rem] mx-auto" />
</button></div>`
                }]
            })

        }
    }).catch((res) => {});
}
</script>
<header>
    <link rel="stylesheet" href="../styles/globals.css">
    <link rel="stylesheet" href="../styles/simple-datatables.css">
    <title>Accounts - The Festival</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta property="og:title" content="Dashboard - The Festival" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
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
        <div class="w-screen relative">
            <?php include __DIR__ . '/../../components/dashboard/sidebar.php' ?>
            <div class="dashboard-right min-h-screen ml-auto">
                <div class="shadow-xl border-black w-full p-4 px-8 mb-10">
                    <h2 class="text-2xl font-semibold">Accounts</h2>
                </div>
                <div class="px-4 md:px-6 lg:px-8">
                    <table class="table"></table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>