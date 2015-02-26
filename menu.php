<?php
	$m_inicio = "<a href='index2.php'>Inicio</a>";
	$m_cadastro = "<a href='#'>Cadastro</a>";
	$m_cadastro_cliente = "<a href='teste2.php'>Cliente</a>";
	
	$m_mostra = "<div id='menu'>
			<ul>
				<li>$m_inicio</li>
				<li>$m_cadastro</li>
					<ul>
						<li>$m_cadastro_cliente</li>
					</ul>
			</ul>
			</div>";
	
	print $m_mostra;
?>
							