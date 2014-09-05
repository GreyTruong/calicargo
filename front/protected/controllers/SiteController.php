<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the about page
	 */
	public function actionAbout()
	{
		
		$this->render('about');
	}

	/**
	 * Displays the ship_cali page
	 */
	public function actionShip_cali()
	{
		
		$this->render('ship_cali');
	}

	/**
	 * Displays the ship_amazon page
	 */
	public function actionShip_amazon()
	{
		
		$this->render('ship_amazon');
	}

	/**
	 * Displays the ship_ups page
	 */
	public function actionShip_ups()
	{
		
		$this->render('ship_ups');
	}

	/**
	 * Displays the ship_order page
	 */
	public function actionShip_order()
	{
		
		$this->render('ship_order');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Sending emails
	*/
	public function actionMailer()
	{
		//
		if(isset($_POST['shipping_amazon_info']) && ($_POST['shipping_amazon_info'] != null) ){
			$customer_email = $_POST['shipping_amazon_info']['email'];
			$data = json_encode($_POST['shipping_amazon_info']);			
			//sending email to customer
			$message = new YiiMailMessage;
			$message->subject = "Your Shipping Information";
			$message->view = 'ship_amazon_customer';
			$message->setBody(array('data'=>$data),'text/html');
			$message->addTo($customer_email);
			$message->from = Yii::app()->params['adminEmail'];   
			Yii::app()->mail->send($message);
			//sending email to sale department
			$message = new YiiMailMessage;
			$message->subject = "Your Shipping Information";
			$message->view = 'ship_amazon_company';
			$message->setBody(array('data'=>$data),'text/html');
			$message->addTo(Yii::app()->params['companyEmail']);
			$message->from = Yii::app()->params['adminEmail'];   
			Yii::app()->mail->send($message);
			echo "success";	
		}
		//
		else if(isset($_POST['shipping_ups_info']) && ($_POST['shipping_ups_info'] != null) ){
			$customer_email = $_POST['shipping_ups_info']['email'];
			$data = json_encode($_POST['shipping_ups_info']);			
			//sending email to customer
			$message = new YiiMailMessage;
			$message->subject = "Your Shipping Information";
			$message->view = 'ship_ups_customer';
			$message->setBody(array('data'=>$data),'text/html');
			$message->addTo($customer_email);
			$message->from = Yii::app()->params['adminEmail'];   
			Yii::app()->mail->send($message);
			//sending email to sale department
			$message = new YiiMailMessage;
			$message->subject = "Your Shipping Information";
			$message->view = 'ship_ups_company';
			$message->setBody(array('data'=>$data),'text/html');
			$message->addTo(Yii::app()->params['companyEmail']);
			$message->from = Yii::app()->params['adminEmail'];   
			Yii::app()->mail->send($message);
			echo "success";	
		}
		//
		else if(isset($_POST['order_amazon_info']) && ($_POST['order_amazon_info'] != null) ){
			$customer_email = $_POST['order_amazon_info']['email'];
			$data = json_encode($_POST['order_amazon_info']);			
			//sending email to customer
			$message = new YiiMailMessage;
			$message->subject = "Your Shipping Information";
			$message->view = 'order_amazon_customer';
			$message->setBody(array('data'=>$data),'text/html');
			$message->addTo($customer_email);
			$message->from = Yii::app()->params['adminEmail'];   
			Yii::app()->mail->send($message);
			//sending email to sale department
			$message = new YiiMailMessage;
			$message->subject = "Your Shipping Information";
			$message->view = 'order_amazon_company';
			$message->setBody(array('data'=>$data),'text/html');
			$message->addTo(Yii::app()->params['companyEmail']);
			$message->from = Yii::app()->params['adminEmail'];   
			Yii::app()->mail->send($message);
			echo "success";	
		}
		else
			echo "failure";
	}
	/**
	 * Displays the email notification page
	 */
	public function actionSent_mail_notification()
	{
		
		$this->render('sent_mail_notification');
	}
}