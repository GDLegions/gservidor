<?php
goto GBRnT; GBRnT: if (!isset($_POST["\151\x64"])) { return; } goto dNUZ0; dNUZ0: $isApc = extension_loaded("\x61\160\143"); goto tDTjs; mKMJw: $data = array(); goto KTHbb; tDTjs: $id = $_POST["\151\x64"]; goto LmBus; KTHbb: if ($id === "\x75\156\144\145\x66\x69\156\145\x64") { $id = empty($cache) ? 0 : $cache[0][0]; } elseif ($id === "\60") { if (!empty($cache)) { $id = $cache[0][0]; $data = $cache; } } else { $end = end($cache); if ($id >= $end[0]) { foreach ($cache as $k => $c) { if ($c[0] === $id) { break; } } $data = array_slice($cache, 0, $k); } else { $date = date("\x59\55\x6d\x2d\x64"); $history = array(); while (($history = array_merge(file("\56\57\150\151\x73\164\157\x72\x79\57" . $date, FILE_IGNORE_NEW_LINES), $history)) && $history[0] > $id) { $date = date("\x59\x2d\x6d\55\x64", strtotime("\55\x31\x20\144\141\x79", strtotime($date))); if (!file_exists("\56\x2f\150\x69\x73\x74\x6f\x72\x79\57" . $date)) { break; } } $history = array_reverse($history); foreach ($history as &$ref) { $ref = explode("\x26", $ref); } foreach ($history as $k => $h) { if ($h[0] === $id) { break; } } $data = array_slice($history, 0, $k); } $id = $cache[0][0]; } goto BfsO6; LmBus: $cache = $isApc ? apc_fetch("\x63\150\141\x74") : @unserialize(file_get_contents("\56\x2f\x74\155\160\57\143\x61\x63\x68\145")); goto mKMJw; BfsO6: echo json_encode(array("\151\x64" => $id, "\144\x61\x74\x61" => $data));


#Your code  :::::::::::::::::::::::::: Your COde




  /* echo "OK";
   $active="On";
   $TXT="SERVER ON";
    include('../api/v1/tlgm.php');
*/











#Your code  :::::::::::::::::::::::::: Your COde