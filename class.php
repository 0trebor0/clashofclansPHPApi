<?php
class api{
    private $token = "YOUR TOKEN";
    private $apiUrl = "https://api.clashofclans.com/v1/";
    private function request( $value ){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, $this->apiUrl.$value);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Accept: application/json",
            "authorization: Bearer ".$this->token)
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    // CLAN Functions
    public function getClan( $clan ){
        if(strpos($clan, "#") == false){
            $url = "clans/".urlencode($clan);
        }else{
            $url = "clans/$clan";
        }
        $da = json_decode($this->request($url),true);
        return $da;
    }
    public function getClanMembers( $clan ){
        if(strpos($clan, "#") == false){
            $url = "clans/".urlencode($clan)."/members";
        }else{
            $url = "clans/$clan/members";
        }
        $da = json_decode($this->request($url),true);
        return $da;
    }
    public function getClanWarLog( $clan ){
        if(strpos($clan, "#") == false){
            $url = "clans/".urlencode($clan)."/warlog";
        }else{
            $url = "clans/$clan/warlog";
        }
        $da = json_decode($this->request($url),true);
        return $da;
    }
    public function getClanCurrentWar( $clan ){
        if(strpos($clan, "#") == false){
            $url = "clans/".urlencode($clan)."/currentwar";
        }else{
            $url = "clans/$clan/currentwar";
        }
        $da = json_decode($this->request($url),true);
        return $da;
    }
    //CLAN functions END
    //PLAYER functions
    public function getPlayer( $player ){
        if(strpos($player, "#") == false){
            $url = "players/".urlencode($player);
        }else{
            $url = "players/".$player;
        }
        $da = json_decode($this->request($url),true);
        return $da;
    }
    //PLAYER functions END
    //Leagues functions START
    public function getLeagues(){
        return json_decode($this->request("leagues"),true);
    }
    //Leagues functions END
}
