<header>
    <h1 class="logo">Kong'Blog</h1>
    <ul class="menu">
        <li class="btn">About me</li>
        <li class="btn">Skills</li>
        <li class="btn">Channel</li>
        <li class="btn">Projects</li>
        <li class="btn">Posts</li>
    </ul>
    <div class="icons">
        <i class="fa-solid fa-magnifying-glass btn"></i>
        <i class="fa-solid fa-moon btn dark-btn"></i>
        <i class="fa-solid fa-sun btn light-btn"></i>
    </div>
</header>

<script>
    const darkBtn = document.querySelector('.dark-btn');
    const lightBtn = document.querySelector('.light-btn');
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
</script>