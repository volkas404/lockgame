<html>
<head>
<meta charset="utf-8">
<title>Lock Game</title>
	<link rel= "stylesheet" href ="./style.css"/>
</head>
<?php
	if(!isset($_POST["text"]) || $_POST["text"] == ''){
	}
	else{
		$p=$_POST["text"];
		$a=floor($p/1000);
		$b=floor(($p%1000)/100);
		$c=floor(($p%100)/10);
		$d=$p%10;
	}
	
	?>
<body>
	<div id="container">
		<h1 align="center">GIẢI MẬT MÃ</h1>
        <div class="row">
            <button type="button" class="btn btn-output"><?php if(!isset($_POST["text"]) || $_POST["text"] == ''); else echo $a; ?></button>
            <button type="button" class="btn btn-output"><?php if(!isset($_POST["text"]) || $_POST["text"] == ''); else echo $b; ?></button>
            <button type="button" class="btn btn-output"><?php if(!isset($_POST["text"]) || $_POST["text"] == ''); else echo $c; ?></button>
			<button type="button" class="btn btn-output"><?php if(!isset($_POST["text"]) || $_POST["text"] == ''); else echo $d; ?></button>
        </div>
		<form method="post">
		<div class="row">
			<div align="center"><input name="text" type="text" size=20 maxlength="4" style="text-align: center; auto; height: 50px; font-size: 1.5rem;"></div>
		</div>
        <div class="row">
			<input type="submit" class="btn btn-check" value="Check" name="nut">
			<input type="submit" class="btn btn-check" value="New game" name="new">
        </div>
		</form>
	<?php
		session_start();
		if (!isset($_POST["new"]))
    	{
    	$_POST["new"] = "undefine";
    	}
		switch($_POST["new"])
    	{
		case 'New game':
				{
					$x=0;$y=0;$z=0;$t=0;
					while( $x == $y || $x == $z || $x == $t || $y == $z || $y == $t || $z == $t )
					{
						$q = mt_rand(1000,9999);
						$x=floor($q/1000);
						$y=floor(($q%1000)/100);
						$z=floor(($q%100)/10);
						$t=$q%10;
					}
					echo 'Đã khởi tạo mật mã';
					$_SESSION['q']=$q;
				}
		}
        if (!isset($_POST["nut"]))
    	{
    	$_POST["nut"] = "undefine";
    	}
		switch($_POST["nut"])
    	{
		case 'Check':
				{
					$q=$_SESSION['q'];
					if(!isset($q)) echo 'Vui lòng bấm New game';
					else{
						$x=floor($q/1000);
						$y=floor(($q%1000)/100);
						$z=floor(($q%100)/10);
						$t=$q%10;
						if($_POST["text"] == ''){
							echo 'Chưa nhập số';
						}
						else if ( $p == $q ){
							echo 'Chúc mừng bạn đã đoán đúng mật mã là '.$p;
						}
						else
						{
							if( $a == $b || $a == $c || $a == $d || $b == $c || $b == $d || $c == $d )
								echo 'Nhập 4 số khác nhau';
							else{
								$i=0;
								$k=0;	
								if( $a != $x && $a == $y || $a == $z || $a == $t ){
									$i++;
								}
								if( $b != $y && $b == $x || $b == $z || $b == $t){
									$i++;
								}
								if( $c != $z && $c == $x || $c == $y || $c == $t){
									$i++;
								}
								if( $d != $t && $d == $x || $d == $y || $d == $z){
									$i++;
								}
								if( $a == $x ){
									$k++;
								}
								if( $b == $y ){
									$k++;
								}
								if( $c == $z ){
									$k++;
								}
								if( $d == $t ){
									$k++;
								}
								echo 'có '.$k.' số đúng và đúng vị trí'.'<br>'.' có '.$i.' số đúng và sai vị trí';
							}

						}
					}

				}
		}
	?>
	</div>
</body>
</html>