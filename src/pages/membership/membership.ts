import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AuthenticationService } from '../../services/authentication.service';
import { BasicService } from '../../services/basic.service';
/**
 * Generated class for the MembershipPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-membership',
  templateUrl: 'membership.html',
})
export class MembershipPage {

	userInfo : any;

  constructor(public navCtrl: NavController, 
  	public navParams: NavParams, 
    public authenticationService: AuthenticationService,
    public basicService: BasicService) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad MembershipPage');
  }
    pay(amount:any, details:any) {
    console.log("Amount "+amount);
    this.authenticationService.getUser().then(res => {
      this.userInfo=res;
      console.log("user found");
      var options = {
      description: details,
      image: 'https://www.saabdik.com/wp-content/uploads/2018/09/logo-sabdik1.png',
      currency: 'INR',
      key: 'rzp_test_1DP5mmOlF5G5ag',
      amount: amount,
      name: 'শাব্দিক',
      prefill: {
        email: this.userInfo.email,
        contact: this.userInfo.billing_phone,
        name: this.userInfo.name
      },
      theme: {
        color: '#F37254'
      },
      modal: {
        ondismiss: function() {
          alert('dismissed')
        }
      }
    };

    var successCallback = (payment_id) => {
      alert('payment_id: ' + payment_id);
      //Navigate to another page using the nav controller
      //this.navCtrl.setRoot(SuccessPage)
      //Inject the necessary controller to the constructor
    };

    var cancelCallback = (error) => {
      alert(error.description + ' (Error ' + error.code + ')');
      //Navigate to another page using the nav controller
      //this.navCtrl.setRoot(ErrorPage)
    };

    RazorpayCheckout.open(options, successCallback, cancelCallback);
	},
	err=>{
	console.log("user not found");
	//this.logout();
	});

    
  }

}
