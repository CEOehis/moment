<?php
	date_default_timezone_set('Africa/Lagos');
	?>
<!DOCTYPE html>
<html>
<head>
	<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
	<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
	<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<title>Moment</title>
	<style>
		body, html {
			height: 100%;
			font-family: 'Josefin Sans', sans-serif;
			color: white;
			text-shadow: 0 0 20px #827676;
		}
		body {
			background: black;
      background: linear-gradient(rgba(255,255,255,0.1),rgba(0,0,0,1)),
        url("./bg.jpg");
			background-size: cover;
			background-position: center;
			/* height: 100%; */
			background-repeat: no-repeat;
			overflow: hidden;
		}

		.app {
			padding: 50px;
			display: flex;
			justify-content: space-between;
			flex-direction: column;
			height: 60%;
		}

		.time {
			font-size: 100px;
			margin-bottom: 0;
		}

		.greeting {
			font-size: 40px;
			margin: 0;
		}

		.todo label {
			font-size: 25px;
			margin: 0;
		}

		.todo input {
			border: none;
			height: 50px;
			width: 60%;
			font-size: 20px;
			background: rgba(255, 255, 255, 0.4);
			border-bottom: 2px solid white;
			color: white;
			padding-left: 15px;
		}

		.todo-item {
			/* height: 50px; */
			font-size: 20px;
			/* padding-top: 10px; */
		}

		.none {
			display: none;
		}

		.block {
			display: block;
		}

		ul {
			margin: 0;
			padding-top: 5px;
		}

		ul p{
			margin-top: 0;
		}

		.close {
			margin-left: 50px;
			border: 1px solid white;
			background: rgba(255, 255, 255, 0.4);
			padding: 0 5px;
		}

		.close:hover {
			cursor: pointer;
			background: rgba(255, 255, 255, 0.8);
		}
	</style>
</head>
<body>
	<div class="app">
		<div>
			<h1 class="time"><?php echo date('H:i: A');?></h1>
			<?php
				$time = date('H');
				$greeting;
				switch($time) {
						case 0:
						case 1:
						case 2:
						case 3:
						case 4:
							$greeting = 'It\'s midnight, you should be asleep';
							break;
						case 5:
						case 6:
						case 7:
						case 8:
						case 9:
						case 10:
						case 11:
							$greeting = 'Good Morning';
							break;
						case 12:
						case 13:
						case 14:
						case 15:
						case 16:
						case 17:
							$greeting = 'Good Afternoon';
							break;
						case 18:
						case 19:
						case 20:
						case 21:
						case 22:
						case 23:
							$greeting = 'Good Evening';
							break;
						default:
							$greeting = 'Hello';
				}
			?>
			<p class="greeting"><?php echo $greeting?>.</p>
		</div>
		<div class="todo">
		</div>
	</div>
	<script type="text/babel">
		class Todo extends React.Component {
			constructor() {
				super();

				this.onChange = this.onChange.bind(this);
				this.submit = this.submit.bind(this);
				this.closeTodo = this.closeTodo.bind(this);

				this.state = {
					todo: '',
					todoAdded: false
				}
			}

			onChange(e) {
				this.setState({
					todo: e.target.value
				})
			}

			submit(e) {
				this.setState({
					todoAdded: true
				})
				e.preventDefault();
			}

			closeTodo() {
				this.setState({
					todoAdded: false
				})
			}
			render() {
				return (
					<div>
						<form onSubmit={this.submit}>
							<label htmlFor="todo-input">What is the one thing you must accomplish today?</label>
							<input id="todo-input" onChange={this.onChange} value={this.state.todo} type="text" className={this.state.todoAdded ? 'none' : 'block'} />
						</form>

						{this.state.todoAdded ?
						<ul>
							<p>today</p>
							<li className="todo-item">{this.state.todo}<i onClick={this.closeTodo} className="close">x</i></li>
						</ul> : ''}
					</div>
				);
			}
		}

		ReactDOM.render(<Todo />, document.querySelector('.todo'));
	</script>
</body>
</html>