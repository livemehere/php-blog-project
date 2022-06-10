<header>
    <h1 class="logo"><a href="/www">Kong'Blog</a></h1>
    <ul class="menu">
        <li class="btn"><a href="/www/posts.php">Posts</a></li>
        <?php
        session_start();
        if(isset($_SESSION["username"])){
            echo  '<li class="btn"><a href="/www/post/write.php">작성하기</a></li>';
        }
        ?>
    </ul>
    <div class="icons">
        <i class="fa-solid fa-magnifying-glass btn search-btn"></i>
        <i class="fa-solid fa-moon btn dark-btn"></i>
        <i class="fa-regular fa-sun btn light-btn"></i>
        <?php
        if(isset($_SESSION["username"])){
            echo  '<span class="btn">'.$_SESSION["username"].'님</span>
                    <span><a href="/www/login/logout.php" class="btn">Logout</a></span>
                            ';
        }else{
            echo '<a href="/www/login/login.php" class="btn">LOGIN</a>';
        }
        ?>
    </div>
    <i class="fa-solid fa-bars hamberger-btn"></i>
</header>
<div class="title">
    <h1>FE Developer</h1>
    <h2>공태민</h2>
</div>
<div class="search-wrap">
    <label>
        <i class="fa-solid fa-magnifying-glass btn "></i>
        <input type="text"/>
        <i class="fa-solid fa-xmark search-close-btn"></i>
    </label>
</div>

<script>
    const darkBtn = document.querySelector('.dark-btn');
    const lightBtn = document.querySelector('.light-btn');
    const hambergerBtn = document.querySelector('.hamberger-btn');
    const searchBtn = document.querySelector('.search-btn');
    const searchWrap = document.querySelector('.search-wrap');
    const searchCloseBtn = document.querySelector('.search-close-btn');
    const menu = document.querySelector('.menu');
    const icons = document.querySelector('.icons');
    loadColorMode();

    darkBtn.addEventListener('click',()=>{
        document.documentElement.setAttribute('color-theme','dark')
        darkBtn.style.display = 'none'
        lightBtn.style.display = 'inline-block'
        saveColorModeIntoLocalStorage('dark');
    })

    lightBtn.addEventListener('click',()=>{
        document.documentElement.setAttribute('color-theme',null)
        lightBtn.style.display = 'none'
        darkBtn.style.display = 'inline-block'
        removeColorModeIntoLocalStorage()
    })

    function saveColorModeIntoLocalStorage(value){
        window.localStorage.setItem('color-mode',value)
    }

    function removeColorModeIntoLocalStorage(){
        window.localStorage.removeItem('color-mode')
    }

    function loadColorMode(){
        const isDarkMode = window.localStorage.getItem('color-mode');
        if(isDarkMode) {
            document.documentElement.setAttribute('color-theme','dark');
            darkBtn.style.display = 'none'
        }else{
            lightBtn.style.display = 'none'
        }
    }

    hambergerBtn.addEventListener('click',()=>{
        menu.classList.toggle('show');
        icons.classList.toggle('show');
    })

    searchBtn.addEventListener('click',()=>{
        searchWrap.style.display='block';
    })

    searchCloseBtn.addEventListener('click',()=>{
        searchWrap.style.display='none';
    })
</script>