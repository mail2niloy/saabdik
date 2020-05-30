import { Component } from '@angular/core';

import { NavController, Platform  } from 'ionic-angular';

import { StreamingMedia, StreamingAudioOptions } from '@ionic-native/streaming-media/ngx';



/**
 * Generated class for the AudioPlayerPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-audio-player',
  templateUrl: 'audio-player.html',
})
export class AudioPlayerPage {

  

  constructor(public navCtrl: NavController,  
    public platform: Platform,
    private streamingMedia: StreamingMedia
    ) {
    
    

  }

playStreamAudio(){
  let options: StreamingAudioOptions = {
    successCallback: () => { console.log('Audio played') },
    errorCallback: (e) => { console.log('Error streaming') }
  };

  this.streamingMedia.playAudio('https://saabdik.com/wp-content/uploads/2020/05/Sleep-Away.mp3', options);
}
 

  
  
  
         
  

}
