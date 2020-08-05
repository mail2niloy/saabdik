import { Component } from '@angular/core';

import { NavController, Platform  } from 'ionic-angular';

import { Media, MediaObject } from '@ionic-native/media/ngx';

import { StreamingMedia, StreamingAudioOptions } from '@ionic-native/streaming-media/ngx';

import { AudioProvider } from 'ionic-audio3';


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

  
  radio: MediaObject; 
  myTracks: any[];
  allTracks: any[];
  selectedTrack:any;
  constructor(public navCtrl: NavController,  
    public platform: Platform,
    private streamingMedia: StreamingMedia,
    private media: Media,
    private _audioProvider: AudioProvider
    ) {
    
    // plugin won't preload data by default, unless preload property is defined within json object - defaults to 'none'
    this.myTracks = [{
      src: 'https://archive.org/download/JM2013-10-05.flac16/V0/jm2013-10-05-t12-MP3-V0.mp3',
      artist: 'John Mayer',
      title: 'Why Georgia',
      art: 'assets/background.jpg',
      preload: 'metadata' // tell the plugin to preload metadata such as duration for this track, set to 'none' to turn off
    },
    {
      src: 'https://archive.org/download/JM2013-10-05.flac16/V0/jm2013-10-05-t30-MP3-V0.mp3',
      artist: 'John Mayer',
      title: 'Who Says',
      art: 'assets/background.jpg',
      preload: 'metadata' // tell the plugin to preload metadata such as duration for this track,  set to 'none' to turn off
    }];

    this.selectedTrack = this.myTracks[0];

  }

playAudio(){ 

  this.radio = this.media.create('https://saabdik.com/wp-content/uploads/2020/05/Sleep-Away.mp3'); 
  this.radio.play(); 
} 
stopAudio(){ 
  this.radio.stop(); 
}

playStreamAudio(){
  let options: StreamingAudioOptions = {
    successCallback: () => { console.log('Audio played') },
    errorCallback: (e) => { console.log('Error streaming') }
  };

  this.streamingMedia.playAudio('https://saabdik.com/wp-content/uploads/2020/05/Sleep-Away.mp3', options);
}

  ngAfterContentInit() {
    // get all tracks managed by AudioProvider so we can control playback via the API
    this.allTracks = this._audioProvider.tracks;
  }

  playSelectedTrack() {
    // use AudioProvider to control selected track
    this._audioProvider.play(this.selectedTrack);
  }

  pauseSelectedTrack() {
     // use AudioProvider to control selected track
     this._audioProvider.pause(this.selectedTrack);
  }

  onTrackFinished(track: any) {
    console.log('Track finished', track)
  }
 

  
  
  
         
  

}
