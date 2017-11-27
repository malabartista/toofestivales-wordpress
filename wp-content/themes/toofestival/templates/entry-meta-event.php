<?php
	$EM_Event = em_get_event($post->ID, 'post_id');
	setlocale(LC_ALL,"es_ES");
	$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    //echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
    //Salida: Viernes 24 de Febrero del 2012
?>
<meta itemprop="startDate" content="<?php echo $EM_Event->event_start_date; ?>">
<meta itemprop="endDate" content="<?php echo $EM_Event->event_end_date; ?>">
<?php if ($EM_Event->event_end_date != $EM_Event->event_start_date) { ?>
&nbsp;Del
 <?php } ?>
<em><?php echo $dias[date("w", strtotime($EM_Event->event_start_date))]; ?></em>,
<span><?php echo date("d", strtotime($EM_Event->event_start_date)); ?></span>
&nbsp;de
<strong><?php echo $meses[date("n", strtotime($EM_Event->event_start_date)) -1 ]; ?></strong>

<?php if ($EM_Event->event_end_date != $EM_Event->event_start_date) { ?>
&nbsp;al
<em><?php echo $dias[date("w", strtotime($EM_Event->event_end_date))]; ?></em>,
<span><?php echo date("d", strtotime($EM_Event->event_end_date)); ?></span>
&nbsp;de
<strong><?php echo $meses[date("n", strtotime($EM_Event->event_end_date)) -1 ]; ?></strong>
<?php } ?>
&nbsp;de
<strong><?php echo date("Y", strtotime($EM_Event->event_end_date)); ?></strong>