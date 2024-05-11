<?php
// Hàm chuyển format ngày sang định dạng việt nam
function formatVietNamDate($date)
{
    // Hàm strtotime đổi ngày sang đơn vị giây tính từ ngày 01/01/1970
    $timestamp = strtotime($date);
    $formatVNDate = date("d/m/Y", $timestamp);
    return $formatVNDate;
}
// Hàm hiển thị giới tính
function getGenderName($gender)
{
    // if ($gender == 0) {
    //     return "Nam";
    // } else if ($gender == 1) {
    //     return "Nữ";
    // } else {
    //     return "Khác";
    // }
    $genderMap = [0 => "Nam", 1 => "Nữ", 2 => "Khác"];
    $genderName = $genderMap[$gender];
    return $genderName;
}
