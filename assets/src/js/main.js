var themeToggleDarkIcon=document.getElementById("theme-toggle-dark-icon"),themeToggleLightIcon=document.getElementById("theme-toggle-light-icon");"dark"!==localStorage.getItem("color-theme")&&("color-theme"in localStorage||!window.matchMedia("(prefers-color-scheme: dark)").matches)?themeToggleDarkIcon.classList.remove("hidden"):themeToggleLightIcon.classList.remove("hidden");var themeToggleBtn=document.getElementById("theme-toggle");themeToggleBtn.addEventListener("click",function(){themeToggleDarkIcon.classList.toggle("hidden"),themeToggleLightIcon.classList.toggle("hidden"),localStorage.getItem("color-theme")?"light"===localStorage.getItem("color-theme")?(document.documentElement.classList.add("dark"),localStorage.setItem("color-theme","dark")):(document.documentElement.classList.remove("dark"),localStorage.setItem("color-theme","light")):document.documentElement.classList.contains("dark")?(document.documentElement.classList.remove("dark"),localStorage.setItem("color-theme","light")):(document.documentElement.classList.add("dark"),localStorage.setItem("color-theme","dark"))});