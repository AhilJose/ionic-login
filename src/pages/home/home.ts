import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Http } from '@angular/http';
import { DashboardPage } from '../dashboard/dashboard';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  data:any = {};
  Okay:any;

  constructor(public navCtrl: NavController, public http: Http) {
  	this.data.username = '';
 	this.data.response = '';
 	this.http = http;
  }
  submit() {
	var link = 'http://localhost/angular/login.php';
	var myData = JSON.stringify({username: this.data.username, password: this.data.password});
	
	this.http.post(link, myData)
	.subscribe(data => {
	this.data.response = data["_body"];
	}, error => {
	console.log("Error!!!");
	});

	if(this.data.response == '1')
	{
		this.pushOver();
//	  	this.navCtrl.setRoot(DashboardPage);
	}
  }
  pushOver()
  {
  	this.navCtrl.setRoot(DashboardPage);
//	this.navCtrl.push(DashboardPage);
  }
}
