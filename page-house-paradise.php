<?php /* Template Name:  House Paradise  */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" data-barba="container" data-barba-namespace="hp" class="hp">

		<div class="home-starter flex pb3 container relative">
			<div class="w-80-ns center relative z-2 mt-0 ml-0 ">
					<h1 class="white f0 lh-0 main-font bold mb2 measure w-80-ns">Vacaciones para tu perro</h1>
				<p class="messina white lh-copy f4 measure-wide">Un campo destinado para que tu mascota disfrute de correr en libertad con sus amigos y juegue hasta agotarse. La mejor experiencia para ellos y para vos.</p>
				<a href="https://api.whatsapp.com/send?phone=+549115780-8539&text=Hola!%20Estoy%20interesado%20en%20darle%20las%20mejores%20vacaciones%20a%20mi%20perro!" target="_blank" class="no-deco flex main-cta white-border br-button mt4 w-max jic">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M27.3375 4.65096C25.8615 3.17229 24.1053 1.99981 22.1708 1.20146C20.2362 0.403109 18.1617 -0.00524659 16.0674 5.08882e-05C7.28562 5.08882e-05 0.136661 7.11331 0.133111 15.8569C0.133111 18.6514 0.86611 21.3787 2.25934 23.7845L0 32L8.44635 29.7938C10.7827 31.0596 13.4002 31.7233 16.0603 31.7244H16.0674C24.8474 31.7244 31.9964 24.6112 31.9999 15.8675C32.006 13.7841 31.597 11.72 30.7968 9.7948C29.9965 7.86955 28.8207 6.12126 27.3375 4.65096V4.65096ZM16.0674 29.0484H16.0621C13.6901 29.0486 11.3617 28.4135 9.32133 27.2095L8.83858 26.9234L3.8265 28.2323L5.16294 23.3694L4.8488 22.8713C3.52263 20.77 2.8206 18.3383 2.82373 15.8569C2.82728 8.59001 8.76759 2.6779 16.0727 2.6779C17.8125 2.67405 19.5358 3.01366 21.1428 3.67706C22.7498 4.34047 24.2086 5.31449 25.4349 6.54277C26.6677 7.76518 27.6449 9.21866 28.3099 10.8192C28.9749 12.4197 29.3146 14.1356 29.3093 15.8675C29.3058 23.1345 23.3655 29.0484 16.0674 29.0484ZM23.3317 19.176C22.9324 18.9764 20.9766 18.019 20.6109 17.8865C20.2471 17.7541 19.9827 17.6887 19.7164 18.0844C19.4502 18.48 18.687 19.3721 18.4545 19.637C18.222 19.902 17.9895 19.9338 17.592 19.7359C17.1944 19.5381 15.9112 19.1195 14.3902 17.77C13.2064 16.7189 12.4077 15.4224 12.1752 15.025C11.9427 14.6275 12.1504 14.4138 12.3509 14.216C12.5302 14.0393 12.7485 13.7532 12.9473 13.5218C13.1461 13.2904 13.2117 13.1261 13.3448 12.8611C13.478 12.5962 13.4123 12.3648 13.3111 12.167C13.2117 11.9674 12.4148 10.0173 12.0829 9.22415C11.7617 8.45577 11.4334 8.55822 11.1884 8.54762C10.9348 8.53729 10.6809 8.53258 10.427 8.53349C10.2252 8.53861 10.0265 8.58518 9.84359 8.67029C9.66065 8.7554 9.49735 8.87721 9.36393 9.02808C8.99832 9.42552 7.9707 10.3829 7.9707 12.333C7.9707 14.2831 9.39765 16.1678 9.59643 16.4328C9.79521 16.6978 12.4042 20.6986 16.3975 22.4156C17.3488 22.8236 18.0907 23.0674 18.6675 23.2511C19.6206 23.5531 20.4885 23.509 21.1753 23.4083C21.9403 23.2952 23.5305 22.4509 23.8624 21.5253C24.1943 20.5997 24.1943 19.8066 24.0949 19.6406C23.9955 19.4745 23.7275 19.3738 23.3317 19.176" fill="white"/>
					</svg>
					<p class="ml2 main-font white f4">Reservar ahora</p>
				</a>
			</div>
			<div class="absolute-cover z--1" style="background-image:url(<?php the_field('first_image');?>)"></div>
		</div>

		<div class="bloques-home">
			<?php get_template_part('template-parts/bloques-marco');?>
		</div>

		<div class="landing-footer pt5-ns flex justify-between container">
		
			<div class="measure center">
				<h1 class="tc f1 center white main-font">Te esperamos!</h1>
				<a href="https://api.whatsapp.com/send?phone=+549115780-8539&text=Hola!%20Estoy%20interesado%20en%20darle%20las%20mejores%20vacaciones%20a%20mi%20perro!" target="_blank" 
					class="no-deco flex main-cta reverse ugo-border br-button mt4 w-max jic center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M27.3375 4.65096C25.8615 3.17229 24.1053 1.99981 22.1708 1.20146C20.2362 0.403109 18.1617 -0.00524659 16.0674 5.08882e-05C7.28562 5.08882e-05 0.136661 7.11331 0.133111 15.8569C0.133111 18.6514 0.86611 21.3787 2.25934 23.7845L0 32L8.44635 29.7938C10.7827 31.0596 13.4002 31.7233 16.0603 31.7244H16.0674C24.8474 31.7244 31.9964 24.6112 31.9999 15.8675C32.006 13.7841 31.597 11.72 30.7968 9.7948C29.9965 7.86955 28.8207 6.12126 27.3375 4.65096V4.65096ZM16.0674 29.0484H16.0621C13.6901 29.0486 11.3617 28.4135 9.32133 27.2095L8.83858 26.9234L3.8265 28.2323L5.16294 23.3694L4.8488 22.8713C3.52263 20.77 2.8206 18.3383 2.82373 15.8569C2.82728 8.59001 8.76759 2.6779 16.0727 2.6779C17.8125 2.67405 19.5358 3.01366 21.1428 3.67706C22.7498 4.34047 24.2086 5.31449 25.4349 6.54277C26.6677 7.76518 27.6449 9.21866 28.3099 10.8192C28.9749 12.4197 29.3146 14.1356 29.3093 15.8675C29.3058 23.1345 23.3655 29.0484 16.0674 29.0484ZM23.3317 19.176C22.9324 18.9764 20.9766 18.019 20.6109 17.8865C20.2471 17.7541 19.9827 17.6887 19.7164 18.0844C19.4502 18.48 18.687 19.3721 18.4545 19.637C18.222 19.902 17.9895 19.9338 17.592 19.7359C17.1944 19.5381 15.9112 19.1195 14.3902 17.77C13.2064 16.7189 12.4077 15.4224 12.1752 15.025C11.9427 14.6275 12.1504 14.4138 12.3509 14.216C12.5302 14.0393 12.7485 13.7532 12.9473 13.5218C13.1461 13.2904 13.2117 13.1261 13.3448 12.8611C13.478 12.5962 13.4123 12.3648 13.3111 12.167C13.2117 11.9674 12.4148 10.0173 12.0829 9.22415C11.7617 8.45577 11.4334 8.55822 11.1884 8.54762C10.9348 8.53729 10.6809 8.53258 10.427 8.53349C10.2252 8.53861 10.0265 8.58518 9.84359 8.67029C9.66065 8.7554 9.49735 8.87721 9.36393 9.02808C8.99832 9.42552 7.9707 10.3829 7.9707 12.333C7.9707 14.2831 9.39765 16.1678 9.59643 16.4328C9.79521 16.6978 12.4042 20.6986 16.3975 22.4156C17.3488 22.8236 18.0907 23.0674 18.6675 23.2511C19.6206 23.5531 20.4885 23.509 21.1753 23.4083C21.9403 23.2952 23.5305 22.4509 23.8624 21.5253C24.1943 20.5997 24.1943 19.8066 24.0949 19.6406C23.9955 19.4745 23.7275 19.3738 23.3317 19.176" fill="var(--darkPink)"/>
					</svg>
					<p class="ml2 main-font white f4">Reservar ahora</p>
				</a>


				<svg width="380" height="39" class="mt5 mb4 logo" viewBox="0 0 380 39" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M147.657 8.64803C147.873 12.992 148.053 17.876 148.197 23.3C148.341 28.7 148.413 33.26 148.413 36.98C147.981 36.98 147.489 36.944 146.937 36.872C146.385 36.8 145.941 36.728 145.605 36.656C145.605 35.048 145.581 33.008 145.533 30.536C145.509 28.064 145.473 25.448 145.425 22.688C143.169 22.712 141.177 22.784 139.449 22.904C137.745 23 136.149 23.156 134.661 23.372C134.685 25.508 134.721 27.536 134.769 29.456C134.817 31.376 134.889 33.068 134.985 34.532C134.649 34.628 134.241 34.7 133.761 34.748C133.281 34.772 132.849 34.772 132.465 34.748C132.225 30.668 132.033 26.528 131.889 22.328C131.769 18.104 131.709 13.88 131.709 9.65603C131.949 9.53603 132.225 9.45203 132.537 9.40403C132.873 9.33203 133.197 9.29603 133.509 9.29603C133.773 9.29603 134.013 9.32003 134.229 9.36803C134.469 9.39203 134.721 9.44003 134.985 9.51203C134.865 10.832 134.769 12.524 134.697 14.588C134.649 16.652 134.637 18.884 134.661 21.284C136.293 20.996 137.973 20.78 139.701 20.636C141.453 20.492 143.337 20.408 145.353 20.384C145.257 17.552 145.161 15.176 145.065 13.256C144.993 11.312 144.897 9.74003 144.777 8.54003C145.209 8.42003 145.521 8.34803 145.713 8.32403C145.929 8.30003 146.145 8.28803 146.361 8.28803C146.601 8.28803 146.829 8.32403 147.045 8.39603C147.285 8.44403 147.489 8.52803 147.657 8.64803Z" fill="white"/>
					<path d="M162.796 8.61203C165.46 8.61203 167.476 9.65603 168.844 11.744C170.236 13.808 170.932 16.832 170.932 20.816C170.932 22.544 170.74 24.26 170.356 25.964C169.996 27.644 169.468 29.144 168.772 30.464C167.884 32.192 166.768 33.5 165.424 34.388C164.104 35.276 162.604 35.72 160.924 35.72C158.452 35.72 156.448 34.52 154.912 32.12C153.4 29.72 152.644 26.612 152.644 22.796C152.644 18.668 153.592 15.272 155.488 12.608C157.384 9.94403 159.82 8.61203 162.796 8.61203ZM161.212 33.596C163.3 33.596 164.944 32.468 166.144 30.212C167.368 27.932 167.98 25.004 167.98 21.428C167.98 17.78 167.524 15.104 166.612 13.4C165.7 11.672 164.272 10.808 162.328 10.808C160.36 10.808 158.752 11.888 157.504 14.048C156.256 16.184 155.632 18.956 155.632 22.364C155.632 25.628 156.124 28.316 157.108 30.428C158.116 32.54 159.484 33.596 161.212 33.596Z" fill="white"/>
					<path d="M188.559 9.58403C189.135 11.912 189.555 14.06 189.819 16.028C190.083 17.972 190.215 19.856 190.215 21.68C190.215 27.128 189.471 31.196 187.983 33.884C186.495 36.548 184.251 37.88 181.251 37.88C178.995 37.88 177.315 36.836 176.211 34.748C175.107 32.66 174.555 29.48 174.555 25.208C174.555 23 174.735 20.684 175.095 18.26C175.455 15.836 175.887 13.88 176.391 12.392C176.583 12.32 176.835 12.272 177.147 12.248C177.459 12.2 177.747 12.176 178.011 12.176C178.227 12.176 178.431 12.188 178.623 12.212C178.815 12.236 178.995 12.272 179.163 12.32C178.635 14.528 178.239 16.652 177.975 18.692C177.711 20.732 177.579 22.64 177.579 24.416C177.579 28.376 177.903 31.244 178.551 33.02C179.199 34.772 180.267 35.648 181.755 35.648C183.507 35.648 184.851 34.58 185.787 32.444C186.747 30.308 187.227 27.308 187.227 23.444C187.227 21.116 187.095 18.92 186.831 16.856C186.567 14.768 186.123 12.524 185.499 10.124C185.931 9.98003 186.399 9.87203 186.903 9.80003C187.431 9.70403 187.983 9.63203 188.559 9.58403Z" fill="white"/>
					<path d="M206.588 24.632C207.068 25.352 207.416 26.132 207.632 26.972C207.872 27.788 207.992 28.688 207.992 29.672C207.992 31.664 207.356 33.296 206.084 34.568C204.812 35.816 203.18 36.44 201.188 36.44C198.788 36.44 196.904 35.564 195.536 33.812C194.192 32.036 193.52 29.732 193.52 26.9C193.904 26.708 194.324 26.54 194.78 26.396C195.236 26.252 195.68 26.168 196.112 26.144C196.088 28.712 196.508 30.728 197.372 32.192C198.26 33.656 199.496 34.388 201.08 34.388C202.28 34.388 203.24 33.992 203.96 33.2C204.704 32.384 205.076 31.316 205.076 29.996C205.076 28.724 204.788 27.596 204.212 26.612C203.636 25.604 202.388 24.392 200.468 22.976C199.316 22.112 198.476 21.428 197.948 20.924C197.42 20.396 196.976 19.856 196.616 19.304C196.136 18.584 195.776 17.804 195.536 16.964C195.296 16.124 195.176 15.212 195.176 14.228C195.176 12.14 195.764 10.484 196.94 9.26003C198.14 8.01203 199.736 7.38803 201.728 7.38803C203.552 7.38803 204.968 7.91603 205.976 8.97203C207.008 10.004 207.764 11.768 208.244 14.264C207.908 14.456 207.536 14.6 207.128 14.696C206.744 14.792 206.252 14.852 205.652 14.876C205.436 12.98 205.016 11.612 204.392 10.772C203.768 9.93203 202.844 9.51203 201.62 9.51203C200.492 9.51203 199.628 9.88403 199.028 10.628C198.428 11.372 198.128 12.452 198.128 13.868C198.128 15.164 198.416 16.328 198.992 17.36C199.592 18.368 200.852 19.592 202.772 21.032C203.924 21.896 204.752 22.58 205.256 23.084C205.784 23.588 206.228 24.104 206.588 24.632Z" fill="white"/>
					<path d="M226.77 35.468C224.874 35.756 222.882 35.972 220.794 36.116C218.73 36.284 216.474 36.404 214.026 36.476C213.33 31.868 212.754 27.188 212.298 22.436C211.866 17.66 211.626 13.556 211.578 10.124C214.914 9.54803 217.59 9.15203 219.606 8.93603C221.622 8.72003 223.734 8.58803 225.942 8.54003C225.942 8.97203 225.918 9.39203 225.87 9.80003C225.846 10.184 225.798 10.544 225.726 10.88C223.758 10.904 221.862 11 220.038 11.168C218.238 11.312 216.462 11.528 214.71 11.816C214.662 13.256 214.662 14.744 214.71 16.28C214.758 17.816 214.842 19.472 214.962 21.248C217.266 20.84 219.042 20.552 220.29 20.384C221.562 20.192 222.822 20.048 224.07 19.952C224.166 20.288 224.226 20.636 224.25 20.996C224.298 21.356 224.31 21.752 224.286 22.184C222.462 22.328 220.878 22.484 219.534 22.652C218.214 22.796 216.738 23 215.106 23.264C215.274 25.232 215.454 27.14 215.646 28.988C215.862 30.836 216.102 32.6 216.366 34.28C218.358 34.232 220.17 34.112 221.802 33.92C223.458 33.728 225.054 33.464 226.59 33.128C226.686 33.464 226.746 33.86 226.77 34.316C226.818 34.772 226.818 35.156 226.77 35.468Z" fill="white"/>
					<path d="M240.021 26.648C240.045 28.184 240.105 29.768 240.201 31.4C240.297 33.008 240.453 35.024 240.669 37.448C240.333 37.496 239.901 37.508 239.373 37.484C238.845 37.46 238.449 37.412 238.185 37.34C237.849 33.332 237.609 29.852 237.465 26.9C237.345 23.948 237.285 20.192 237.285 15.632C237.285 14.744 237.309 13.676 237.357 12.428C237.405 11.18 237.465 10.124 237.537 9.26003C238.785 8.92403 239.937 8.68403 240.993 8.54003C242.073 8.37203 243.105 8.28803 244.089 8.28803C247.017 8.28803 249.273 8.91203 250.857 10.16C252.465 11.384 253.269 13.1 253.269 15.308C253.269 17.804 252.189 19.988 250.029 21.86C247.869 23.708 244.533 25.304 240.021 26.648ZM240.597 10.736C240.405 12.776 240.261 14.756 240.165 16.676C240.069 18.572 240.021 20.648 240.021 22.904C240.021 23.168 240.021 23.432 240.021 23.696C240.021 23.936 240.021 24.188 240.021 24.452C243.429 23.54 245.997 22.352 247.725 20.888C249.453 19.4 250.317 17.66 250.317 15.668C250.317 13.916 249.777 12.584 248.697 11.672C247.617 10.736 246.057 10.268 244.017 10.268C243.465 10.268 242.901 10.304 242.325 10.376C241.773 10.448 241.197 10.568 240.597 10.736Z" fill="white"/>
					<path d="M272.289 37.88C271.905 38.096 271.509 38.276 271.101 38.42C270.693 38.564 270.165 38.684 269.517 38.78C269.157 36.308 268.797 34.136 268.437 32.264C268.077 30.392 267.705 28.676 267.321 27.116C265.617 27.092 263.949 27.14 262.317 27.26C260.685 27.356 259.161 27.512 257.745 27.728C257.241 28.976 256.677 30.26 256.053 31.58C255.453 32.9 254.781 34.292 254.037 35.756C253.581 35.66 253.149 35.504 252.741 35.288C252.333 35.096 251.937 34.82 251.553 34.46C253.689 30.692 255.429 27.008 256.773 23.408C258.141 19.784 259.461 15.188 260.733 9.62003C261.381 9.64403 261.921 9.68003 262.353 9.72803C262.785 9.77603 263.205 9.84803 263.613 9.94403C265.965 14.504 267.777 18.86 269.049 23.012C270.345 27.164 271.425 32.12 272.289 37.88ZM262.245 13.004C261.669 15.524 261.081 17.804 260.481 19.844C259.905 21.86 259.269 23.78 258.573 25.604C259.725 25.436 260.985 25.304 262.353 25.208C263.721 25.088 265.197 25.004 266.781 24.956C266.181 22.844 265.521 20.828 264.801 18.908C264.081 16.988 263.229 15.02 262.245 13.004Z" fill="white"/>
					<path d="M292.529 34.784C292.289 35 291.917 35.228 291.413 35.468C290.909 35.732 290.441 35.912 290.009 36.008C288.641 32.936 287.453 30.5 286.445 28.7C285.461 26.9 284.369 25.184 283.169 23.552C282.593 23.816 281.945 24.068 281.225 24.308C280.529 24.524 279.773 24.74 278.957 24.956C278.885 26.876 278.801 28.676 278.705 30.356C278.609 32.036 278.489 33.644 278.345 35.18C277.985 35.228 277.565 35.228 277.085 35.18C276.629 35.156 276.257 35.108 275.969 35.036C276.089 33.14 276.161 31.616 276.185 30.464C276.233 29.288 276.257 28.064 276.257 26.792C276.257 22.928 276.197 19.868 276.077 17.612C275.957 15.356 275.729 12.716 275.393 9.69203C276.449 8.94803 277.649 8.36003 278.993 7.92803C280.361 7.49603 281.705 7.28003 283.025 7.28003C285.401 7.28003 287.273 7.90403 288.641 9.15203C290.033 10.4 290.729 12.068 290.729 14.156C290.729 15.932 290.285 17.516 289.397 18.908C288.509 20.276 287.165 21.476 285.365 22.508C286.517 23.876 287.693 25.592 288.893 27.656C290.093 29.696 291.305 32.072 292.529 34.784ZM278.525 10.376C278.693 12.512 278.813 14.384 278.885 15.992C278.957 17.6 278.993 19.208 278.993 20.816C278.993 21.176 278.993 21.536 278.993 21.896C278.993 22.232 278.993 22.58 278.993 22.94C281.993 22.196 284.213 21.152 285.653 19.808C287.093 18.464 287.813 16.748 287.813 14.66C287.813 12.956 287.369 11.648 286.481 10.736C285.617 9.80003 284.369 9.33203 282.737 9.33203C282.017 9.33203 281.297 9.42803 280.577 9.62003C279.881 9.78803 279.197 10.04 278.525 10.376Z" fill="white"/>
					<path d="M314.898 37.88C314.514 38.096 314.118 38.276 313.71 38.42C313.302 38.564 312.774 38.684 312.126 38.78C311.766 36.308 311.406 34.136 311.046 32.264C310.686 30.392 310.314 28.676 309.93 27.116C308.226 27.092 306.558 27.14 304.926 27.26C303.294 27.356 301.77 27.512 300.354 27.728C299.85 28.976 299.286 30.26 298.662 31.58C298.062 32.9 297.39 34.292 296.646 35.756C296.19 35.66 295.758 35.504 295.35 35.288C294.942 35.096 294.546 34.82 294.162 34.46C296.298 30.692 298.038 27.008 299.382 23.408C300.75 19.784 302.07 15.188 303.342 9.62003C303.99 9.64403 304.53 9.68003 304.962 9.72803C305.394 9.77603 305.814 9.84803 306.222 9.94403C308.574 14.504 310.386 18.86 311.658 23.012C312.954 27.164 314.034 32.12 314.898 37.88ZM304.854 13.004C304.278 15.524 303.69 17.804 303.09 19.844C302.514 21.86 301.878 23.78 301.182 25.604C302.334 25.436 303.594 25.304 304.962 25.208C306.33 25.088 307.806 25.004 309.39 24.956C308.79 22.844 308.13 20.828 307.41 18.908C306.69 16.988 305.838 15.02 304.854 13.004Z" fill="white"/>
					<path d="M334.887 19.016C334.887 22.664 333.627 25.976 331.107 28.952C328.587 31.928 325.203 34.076 320.955 35.396C320.787 35.396 320.379 35.36 319.731 35.288C319.083 35.216 318.675 35.156 318.507 35.108C318.291 31.268 318.135 27.944 318.039 25.136C317.967 22.304 317.931 19.496 317.931 16.712C317.931 15.728 317.943 14.696 317.967 13.616C317.991 12.512 318.015 11.54 318.039 10.7C319.071 10.196 320.139 9.82403 321.243 9.58403C322.347 9.32003 323.535 9.18803 324.807 9.18803C328.095 9.18803 330.591 10.028 332.295 11.708C334.023 13.388 334.887 15.824 334.887 19.016ZM321.099 11.852C320.979 13.916 320.883 15.836 320.811 17.612C320.763 19.364 320.739 22.412 320.739 26.756C320.739 28.004 320.739 29.144 320.739 30.176C320.763 31.184 320.799 32.204 320.847 33.236C324.495 31.844 327.255 29.948 329.127 27.548C330.999 25.124 331.935 22.256 331.935 18.944C331.935 16.448 331.275 14.552 329.955 13.256C328.659 11.936 326.763 11.276 324.267 11.276C323.739 11.276 323.211 11.324 322.683 11.42C322.179 11.516 321.651 11.66 321.099 11.852Z" fill="white"/>
					<path d="M341.985 17.468C341.985 22.844 341.961 26.648 341.913 28.88C341.889 31.088 341.829 33.368 341.733 35.72C341.493 35.792 341.157 35.852 340.725 35.9C340.293 35.948 339.837 35.984 339.357 36.008C339.405 31.232 339.381 26.756 339.285 22.58C339.189 18.404 339.009 14.54 338.745 10.988C339.033 10.82 339.333 10.7 339.645 10.628C339.981 10.556 340.317 10.52 340.653 10.52C340.845 10.52 341.025 10.532 341.193 10.556C341.385 10.556 341.589 10.58 341.805 10.628C341.877 11.636 341.925 12.668 341.949 13.724C341.973 14.78 341.985 16.028 341.985 17.468Z" fill="white"/>
					<path d="M359.026 24.632C359.506 25.352 359.854 26.132 360.07 26.972C360.31 27.788 360.43 28.688 360.43 29.672C360.43 31.664 359.794 33.296 358.522 34.568C357.25 35.816 355.618 36.44 353.626 36.44C351.226 36.44 349.342 35.564 347.974 33.812C346.63 32.036 345.958 29.732 345.958 26.9C346.342 26.708 346.762 26.54 347.218 26.396C347.674 26.252 348.118 26.168 348.55 26.144C348.526 28.712 348.946 30.728 349.81 32.192C350.698 33.656 351.934 34.388 353.518 34.388C354.718 34.388 355.678 33.992 356.398 33.2C357.142 32.384 357.514 31.316 357.514 29.996C357.514 28.724 357.226 27.596 356.65 26.612C356.074 25.604 354.826 24.392 352.906 22.976C351.754 22.112 350.914 21.428 350.386 20.924C349.858 20.396 349.414 19.856 349.054 19.304C348.574 18.584 348.214 17.804 347.974 16.964C347.734 16.124 347.614 15.212 347.614 14.228C347.614 12.14 348.202 10.484 349.378 9.26003C350.578 8.01203 352.174 7.38803 354.166 7.38803C355.99 7.38803 357.406 7.91603 358.414 8.97203C359.446 10.004 360.202 11.768 360.682 14.264C360.346 14.456 359.974 14.6 359.566 14.696C359.182 14.792 358.69 14.852 358.09 14.876C357.874 12.98 357.454 11.612 356.83 10.772C356.206 9.93203 355.282 9.51203 354.058 9.51203C352.93 9.51203 352.066 9.88403 351.466 10.628C350.866 11.372 350.566 12.452 350.566 13.868C350.566 15.164 350.854 16.328 351.43 17.36C352.03 18.368 353.29 19.592 355.21 21.032C356.362 21.896 357.19 22.58 357.694 23.084C358.222 23.588 358.666 24.104 359.026 24.632Z" fill="white"/>
					<path d="M379.208 35.468C377.312 35.756 375.32 35.972 373.232 36.116C371.168 36.284 368.912 36.404 366.464 36.476C365.768 31.868 365.192 27.188 364.736 22.436C364.304 17.66 364.064 13.556 364.016 10.124C367.352 9.54803 370.028 9.15203 372.044 8.93603C374.06 8.72003 376.172 8.58803 378.38 8.54003C378.38 8.97203 378.356 9.39203 378.308 9.80003C378.284 10.184 378.236 10.544 378.164 10.88C376.196 10.904 374.3 11 372.476 11.168C370.676 11.312 368.9 11.528 367.148 11.816C367.1 13.256 367.1 14.744 367.148 16.28C367.196 17.816 367.28 19.472 367.4 21.248C369.704 20.84 371.48 20.552 372.728 20.384C374 20.192 375.26 20.048 376.508 19.952C376.604 20.288 376.664 20.636 376.688 20.996C376.736 21.356 376.748 21.752 376.724 22.184C374.9 22.328 373.316 22.484 371.972 22.652C370.652 22.796 369.176 23 367.544 23.264C367.712 25.232 367.892 27.14 368.084 28.988C368.3 30.836 368.54 32.6 368.804 34.28C370.796 34.232 372.608 34.112 374.24 33.92C375.896 33.728 377.492 33.464 379.028 33.128C379.124 33.464 379.184 33.86 379.208 34.316C379.256 34.772 379.256 35.156 379.208 35.468Z" fill="white"/>
					<path d="M31.0106 1.00757V21.7849C31.0106 26.9435 29.6739 30.9897 27.0005 33.9235C24.3271 36.8573 20.4868 38.322 15.4795 38.322C10.4723 38.322 6.64052 36.8551 3.98431 33.9235C1.3281 30.992 0 26.9458 0 21.7849V1.00757H12.4623V21.9431C12.4623 25.3005 13.4659 26.9792 15.4774 26.9792C17.5211 26.9792 18.544 25.3005 18.544 21.9431V1.00757H31.0106Z" fill="white"/>
					<path d="M85.9532 8.13721C87.9926 8.13721 89.8967 8.51396 91.6675 9.26524C93.4383 10.0165 94.9727 11.0665 96.275 12.4175C97.5752 13.7685 98.6024 15.3602 99.3546 17.1972C100.105 19.0341 100.481 21.0383 100.481 23.2097C100.481 25.3253 100.12 27.3005 99.3932 29.1374C98.669 30.9744 97.6568 32.5751 96.3545 33.9394C95.0522 35.3037 93.5178 36.376 91.747 37.1541C89.9762 37.9321 88.0442 38.3222 85.951 38.3222C83.8579 38.3222 81.9259 37.9321 80.1551 37.1541C78.3843 36.376 76.8477 35.3037 75.5475 33.9394C74.2452 32.5751 73.233 30.9744 72.5088 29.1374C71.7846 27.3005 71.4214 25.3253 71.4214 23.2097C71.4214 21.0383 71.7975 19.0341 72.5475 17.1972C73.2975 15.3602 74.3312 13.7685 75.6464 12.4175C76.9616 11.0688 78.496 10.0165 80.2539 9.26524C82.0161 8.51396 83.9137 8.13721 85.9532 8.13721ZM85.9532 28.9279C86.6237 28.9279 87.2404 28.783 87.8035 28.4909C88.3665 28.2011 88.8565 27.8043 89.2713 27.3049C89.6882 26.8056 90.0084 26.2103 90.2383 25.517C90.4661 24.8237 90.58 24.0746 90.58 23.2721C90.58 21.4708 90.1309 20.0619 89.2326 19.0497C88.3343 18.0376 87.2404 17.5316 85.9532 17.5316C84.6659 17.5316 83.572 18.0376 82.6737 19.0497C81.7754 20.0619 81.3263 21.4686 81.3263 23.2721C81.3263 24.0769 81.4402 24.8259 81.668 25.517C81.8958 26.2103 82.2181 26.8056 82.6329 27.3049C83.0477 27.8043 83.5377 28.1989 84.1029 28.4909C84.6659 28.783 85.2827 28.9279 85.9532 28.9279Z" fill="#F4B5CD"/>
					<path d="M67.5162 33.9638C68.6402 31.9685 69.2677 30.1895 69.7706 27.8599C70.2713 25.5302 70.3573 23.1292 70.0263 20.6703H66.2787H55.6664C55.6664 20.6703 53.9236 20.7171 54.1148 22.3267C54.1234 22.3869 54.233 22.7079 54.261 22.7614C54.8885 23.9652 55.2065 24.5649 55.2065 24.5649C54.9057 25.4856 53.5174 26.043 53.0575 26.1834C52.5976 26.3239 52.1119 26.3952 51.6005 26.3952C50.7494 26.3952 49.9672 26.2102 49.2516 25.8423C48.5359 25.4723 47.9127 24.9707 47.3862 24.3353C46.8575 23.7022 46.4492 22.9442 46.1591 22.0659C45.869 21.1853 45.725 20.2356 45.725 19.2146C45.725 16.925 46.2945 15.1393 47.4378 13.853C48.5789 12.5689 49.9672 11.9247 51.6005 11.9247C52.9629 11.9247 54.1471 12.3505 55.1528 13.1976C56.1564 14.0447 56.8463 15.2642 57.2223 16.8537H69.8931C69.6201 14.3814 68.9647 12.1164 67.9267 10.0587C66.8866 8.00327 65.5584 6.22873 63.9402 4.73732C62.322 3.24813 60.4652 2.08442 58.3721 1.25065C56.2768 0.416887 54.0203 0 51.6005 0C49.013 0 46.6018 0.477079 44.3711 1.43123C42.1404 2.38538 40.1891 3.71851 38.5214 5.43286C36.8516 7.14721 35.5407 9.16921 34.5865 11.5011C33.6324 13.833 33.1553 16.3789 33.1553 19.1343C33.1553 21.8206 33.6152 24.3286 34.535 26.6605C35.4547 28.9924 36.7399 31.0255 38.3925 32.7555C40.0451 34.4877 41.9964 35.8475 44.2443 36.8374C46.4922 37.825 48.9443 38.3221 51.6005 38.3221C54.1213 38.3221 56.4637 37.8695 58.6278 36.9689C59.4229 36.6367 60.375 36.0972 61.0971 35.6714L62.0147 37.4014C62.7411 38.3867 63.5964 38.8794 64.9524 37.4081C65.6573 36.6546 66.6093 35.5756 67.5162 33.9638Z" fill="#F4B5CD"/>
					<path d="M110.813 22.893C110.448 24.6965 109.659 25.7532 108.844 25.9717C108.189 26.1478 107.319 26.1478 107.319 26.1478C107.319 26.1478 106.513 26.1478 105.793 25.9717C104.972 25.7711 104.187 24.6965 103.824 22.893C103.474 21.1452 101.518 2.35648 101.643 1.80361C101.765 1.25742 102.705 1.11475 102.705 1.11475H111.933C111.933 1.11475 112.874 1.25965 112.994 1.80361C113.119 2.35871 111.163 21.1474 110.813 22.893Z" fill="#F4B5CD"/>
					<path d="M107.318 27.6191C107.97 27.6191 108.578 27.7395 109.143 27.9803C109.708 28.2211 110.2 28.5555 110.615 28.9879C111.03 29.4182 111.359 29.9287 111.599 30.515C111.84 31.1013 111.958 31.7412 111.958 32.4345C111.958 33.11 111.842 33.7409 111.61 34.3294C111.378 34.9157 111.056 35.4284 110.639 35.8632C110.224 36.2979 109.732 36.6412 109.167 36.8909C108.601 37.1406 107.985 37.2654 107.316 37.2654C106.648 37.2654 106.031 37.1406 105.466 36.8909C104.901 36.6412 104.409 36.3001 103.994 35.8632C103.579 35.4284 103.255 34.9157 103.022 34.3294C102.79 33.7431 102.674 33.1122 102.674 32.4345C102.674 31.7412 102.795 31.1013 103.035 30.515C103.276 29.9287 103.605 29.4204 104.026 28.9879C104.445 28.5577 104.937 28.2211 105.498 27.9803C106.059 27.7395 106.667 27.6191 107.318 27.6191Z" fill="#F4B5CD"/>
				</svg>
			</div>


		</div>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php
get_footer();
