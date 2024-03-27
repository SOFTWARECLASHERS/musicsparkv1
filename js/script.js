/* MUSIC SHOW ONLINE MUSIC DOWNLOADER  */
console.log('%cDESIGNER: HADI DEVELOPER: MANSHA', 'background:yellow; color:red; font-size:35px;border-radius:10px; font-family:var(--be-b); padding:10px; font-weight:900;');

console.log('%cMUSIC SPARK BY MANSHA AND HADI 😊😊😊😊😊😊😊', 'background:yellow; color:red; font-size:35px;border-radius:10px; font-family:var(--be-b); padding:10px; font-weight:900;');

const dom = document.getElementsByTagName('body')[0]
const header = document.getElementById('sh-scroll');
const sidebar = document.getElementById('sidebar');
window.onscroll = () => {
	if (window.scrollY > 22) {
		header.classList.add('scrolled');
		sidebar.classList.add('box-sidebar-shadow-scrolled');
	}else{
		header.classList.remove('scrolled');
		sidebar.classList.remove('box-sidebar-shadow-scrolled');
	}
}

function collapseSidebar() {
	dom.classList.toggle('sidebar-expand')
}

var navLink = document.querySelectorAll('.sidebar-nav-link');   
function linkAction(){
  /*Active link*/
  navLink.forEach(n => n.classList.remove('active'));
  this.classList.add('active');
}
navLink.forEach(n => n.addEventListener('click', linkAction));
const buttons = document.querySelectorAll('#buttons');
buttons.forEach(btn => {
	btn.addEventListener('click', function (e) {
		let x = e.clientX - e.target.offsetLeft;
		let y = e.clientY - e.target.offsetTop;
		let ripples = document.createElement('span');
		ripples.classList.add('span-r');
		ripples.style.left = x + 'px';
		ripples.style.top = y + 'px';
		this.appendChild(ripples);
		setTimeout(() => {
			ripples.remove();
		}, 1000)
	})
});
window.addEventListener('beforeunload', (e) => {
	(e || window.evenet);
})

//body 

			// window.addEventListener('load', () => {loadname()})
			window.addEventListener("scroll", function () { scrollanim() })
			function scrollanim() {
				var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
				var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
				var scrolled = (winScroll / height) * 100;
				document.getElementById("myBar").style.width = scrolled + "%";
			}
			function playjx(val) {
				$.ajax({
					url: "fetchmusic",
					method: "GET",
					data: { value: val },
					beforeSend: function () {
						$('#loadin-anim').fadeIn();
					},
					success: (data) => {
						$('.music-play-container').html(data);
						$('#loadin-anim').fadeOut();
					}
				});
			};
			//setInterval(() => {loadname()},3000);
			/*	function loadname() {
						$.ajax({
							url: "fetchname",
							method: "GET",
							data:{},
							beforeSend: function(){
							},
							success:(data) => {
								var tempdata = document.getElementById('search-input');
								tempdata.placeholder = `${ data }`;
							}
						});
					};
			*/
			function hasNetwork(online) {
				console.log(online);
			}
			window.addEventListener("load", () => {
				hasNetwork(navigator.onLine);

				window.addEventListener("online", () => {
					hasNetwork(true);
				})

				window.addEventListener("offline", () => {
					hasNetwork(false);
				})
			})
			// search algo
			$(document).ready(function () {
				var string = window.location.search;
				var urlParamsrr = new URLSearchParams(string);
				var id = urlParamsrr.get("search");
				if (id) {
					$.ajax({
						url: "fetch",
						method: "POST",
						data: { query: id },
						beforeSend: function () {
							$('#loadin-anim').fadeIn();
							// $('#list-show').fadeOut();
						},
						success: (data) => {
							$('#list-show').fadeIn();
							$('body').css('overflow-y', 'hidden')
							$('#loadin-anim').fadeOut();
							$('#list-show').html(data);
						}
					});
				}
				$('#list-show').fadeOut();
				$('#loadin-anim').fadeOut();
				$("#search-input").keyup(function () {
					var query = $(this).val().trim();
					window.history.pushState(null, "search", `?search=${query}`);
					if (query.replace(/\s/g, "").length <= 0) {
						$('#list-show').fadeOut();
						$('body').css('overflow-y', 'scroll');
					} else {
						if (query != '') {
							$.ajax({
								url: "fetch",
								method: "POST",
								data: { query: query },
								beforeSend: function () {
									$('#loadin-anim').fadeIn();
									// $('#list-show').fadeOut();
								},
								success: (data) => {
									$('#list-show').fadeIn();
									$('body').css('overflow-y', 'hidden')
									$('#loadin-anim').fadeOut();
									$('#list-show').html(data);
								}
							});
						} else {
							$('body').css('overflow-y', 'scroll');
							$('#list-show').fadeOut();
						}
					}
				});
			})
			// toggle theme
			let darkMode = localStorage.getItem('darkMode');
			const buttontoggle = document.querySelector('.toggle-theme');
			const body = document.getElementsByTagName('body')[0];
			const themeDark = 'dark';
			// default mode = light
			localStorage.setItem("darkMode", null);
			const enableDarkMode = () => {
				body.classList.add(themeDark);
				body.style.background = "#333333";
				localStorage.setItem("darkMode", "enabled");
			};
			const disableDarkMode = () => {
				body.classList.remove(themeDark);
				body.style.background = "#fff";
				localStorage.setItem("darkMode", null);
			};
			if (darkMode == 'enabled') {
				enableDarkMode();
			} else {
				disableDarkMode();
			}
			buttontoggle.addEventListener('click', () => {
				darkMode = localStorage.getItem('darkMode');
				if (darkMode !== 'enabled') {
					enableDarkMode();
				} else {
					disableDarkMode();
				}
			})
        window.addEventListener('keydown', (e) => {  
         if (e.keyCode === 32 && e.target === document.body) {  
           e.preventDefault();  
         }  
        });