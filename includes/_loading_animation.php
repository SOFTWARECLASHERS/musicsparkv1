<style>
	.loading-bar{
		width: 100%;
		height: 0.16em;
		position: fixed;
		z-index: 99999;
		overflow: hidden;
		background-color: none;
	}
	.loading-bar::before{
		display: block;
		position: absolute;
		content: "";
		left: -200px;
		width: 200px;
		height: 4px;
		background-color: #6c63ff;
		--webkit-animation: loading_line 2s linear infinite;
		animation: loading_line 1.8s linear infinite;
	}
	@-webkit-keyframes loading_line {
		from{left: -200px; width: 30%;}
		50%{ width: 30%; }
		70%{ width: 70%; }
		80%{ left: 50%; }
		95%{ left: 120%; }
		to{ left: 100%;  }
	}
	@-webkit-keyframes loading_line {
		from{left: -200px; width: 30%;}
		50%{ width: 30%; }
		70%{ width: 70%; }
		80%{ left: 50%; }
		95%{ left: 120%; }
		to{ left: 100%;  }
	}
</style>

<div class="loading-bar" id="loadin-anim"></div>
