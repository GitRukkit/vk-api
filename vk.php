<?php

class vk{
    
    public static function sendMessage($token, $version, $peerID = null, $randomID = null, $domain = null, $chatID = null, $userIDs = null, $message = null, $lat = null, $long = null, $attachments = null, $forward_messages = null, $stickerID = null){
        
        
        /* CHECKING FOR ENTERED VALUES AND RETURN ERROR'S*/
        
       if($token == null){
            
            trigger_error("Set access_token", E_USER_ERROR);
            
        }
        
       if($version == null){
            
            trigger_error("Set API version", E_USER_ERROR);
            
        }
        
       if($message == null && $attachments == null){
            
            trigger_error("Set one of the values: message or attachments", E_USER_ERROR);
            
        }
        
       if($peerID == null && $chatID == null && $userIDs == null){
            
            trigger_error("Set one of the values: peer_id, chat_id or user_ids(only for groups!)", E_USER_ERROR);
            
        }
        
        if($chatID != null && !ctype_digit($chatID)){
            
            trigger_error("chat_id can have only digits", E_USER_ERROR);
            
        }
        
        if($stickerID != null && !ctype_digit($stickerID)){
            
            trigger_error("sticker_id can have only positive digits", E_USER_ERROR);
            
        }
        
        /* CHECKING FOR ENTERED VALUES AND BUILD HTTP QUERY */
        
        $query = array();
        
        if($token != null){
            
            $query['access_token'] = $token;
            
        }
        
        if($version != null){
            
            $query['v'] = $version;
            
        }
        
        if($peerID != null){
            
            $query['peer_id'] = $peerID;
            
        }
        
        if($randomID != null){
            
            $query['random_id'] = $randomID;
            
        }
        
        if($domain != null){
            
            $query['domain'] = $domain;
            
        }
        
        if($chatID != null){
            
            $query['chat_id'] = $chatID;
            
        }
        
        if($userIDs != null){
            $query['user_id'] = $userIDs;
            
        }
        
        if($message != null){
            $query['message'] = $message;
            
        }
        
        if($lat != null){
            
            $query['lat'] = $lat;
            
        }
        
        if($long != null){
            
            $query['long'] = $long;
            
        }
        
        if($attachments != null){
            
            $query['attachment'] = $attachments;
            
        }
        
        if($forward_messages != null){
            
            $query['forward_messages'] = $forward_messages;
            
        }
        
        if($stickerID != null){
            
            $query['sticker_id'] = $stickerID;
            
        }
        
        $params  = http_build_query($query); 
        $answer = file_get_contents('https://api.vk.com/method/messages.send?'. $params); 
        
        return $answer;
        
    }
    
}

//Пример отправки. Доступные аргументы четко видно выше, там, где я обозначаю функцию
$vk = vk::sendMessage('паставь суда access_token', '5.62', 'а сюда айди того, кому пишешь сапщение(id пользователя, группы или беседы)', null, null, null, null, 'Это дебильное сообщение также отправлено с помощью нового класса Зины Шурыгиной!', null, null, 'аттач епта можна');
//$vk = json_decode($vk, true);

?>
