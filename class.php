<?php 
class stroe {
  private $openingHours = [
    'Mon, Wed, Fri' => '08:00 - 16:00',
    'Tue, Thu, Sat' => '08:00 - 12:00',
    'Tue, Thu' => '14:00 - 18:00',
];

public function isOpenOn($date) {
    $dayOfWeek = date('D', strtotime($date));
    return isset($this->openingHours[$dayOfWeek]) && $this->isWithinTime($date, $this->openingHours[$dayOfWeek]);
}

public function nextOpeningDate($date) {
  $currentTimestamp = strtotime($date);
  foreach ($this->openingHours as $day => $hours) {
      $dayOfWeek = date('D', strtotime($day));
      $openingTimestamp = strtotime($day . ' ' . substr($hours, 0, 5));
      if ($openingTimestamp > $currentTimestamp) {
          return date('l, H:i', $openingTimestamp);
      }
  }
  return null;
}