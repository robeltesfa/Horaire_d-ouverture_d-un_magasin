<?php 
class stroe {
  private $openingHours = ['Mon, Wed,, Fri' => '08:00 - 16:00', 
                            'Tue, Thu, sat' => '08:00 - 12:00',
                            'Tue, Thu' => '14:00 -18:00'];
  public function isOpenOn($date) {
                            $daysofWeeek = date('D', strtotime($date));
                            return isset($this->isOpenOn[$daysofWeeek]) && $this ->isWithinTiME($date, $this->openingHours[$daysofWeeek]);
  }
}