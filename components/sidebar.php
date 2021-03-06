
<div class="sidebar">
    <div id="product" class="sidebar-item">Product</div>
    <div id="staff" class="sidebar-item">Staff</div>
    <div id="invoice" class="sidebar-item">Invoice</div>
    <div id="customer" class="sidebar-item">Customer</div>
    <div id="logout" class="sidebar-item bot-sidebar">Logout</div>
</div> 
<script type="module">
    window.onhashchange = function() {
        alert("Changed")
    }
    document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "beforeend",
        "<link rel=\"stylesheet\" href=\"/NLCS/components/sidebar.css\" />");
    import {
        deleteAllCookies
    } from "./util.js"
    let itemList = document.querySelectorAll('.sidebar-item')
    for (let item of itemList) {
        if (item.id === 'logout') {
            item.addEventListener('click', () => {
                if(confirm('Do you want to logout?') == true){
                    deleteAllCookies()
                window.location.replace("./index.php")
                } 
            })
        }
        if (item.id === 'product') {
            item.addEventListener('click', () => {
                window.location.replace("./product.php")
            })
        }
        if (item.id === 'staff') {
            item.addEventListener('click', () => {
                window.location.replace("./staff.php")
            })
        }
        if (item.id === 'customer') {
            item.addEventListener('click', () => {
                window.location.replace("./customer.php")
            })
        }
        if (item.id === 'invoice') {
            item.addEventListener('click', () => {
                window.location.replace("./invoice.php")
            })
        }
    }
</script>