package com.chkdesign.vpnfree.view;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.ConcatAdapter;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.chkdesign.vpnfree.R;
import com.chkdesign.vpnfree.data.LoginDataSource;
import com.chkdesign.vpnfree.speed_meter.activities.HomeActivity;

import java.util.concurrent.ExecutionException;

public class Login extends AppCompatActivity {
    EditText username, password;
    Button login;
    SharedPreferences sharedPreferences;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        login = findViewById(R.id.btn_login);
        sharedPreferences = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                username = findViewById(R.id.et_email);
                password = findViewById(R.id.et_password);
                try {
                    onLogin();
                } catch (ExecutionException e) {
                    e.printStackTrace();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        });


    }

    public void onLogin() throws ExecutionException, InterruptedException {
        String uname = username.getText().toString();
        String pass = password.getText().toString();
        String type = "login";
        LoginDataSource dataSource = new LoginDataSource(this);
        String res =  dataSource.execute(type,uname,pass).get();
        if (res.equals("User exists.")){
            SharedPreferences.Editor editor = sharedPreferences.edit();
            editor.putString("username", username.getText().toString());
            editor.putString("password", password.getText().toString());
            editor.apply();
            Toast.makeText(getApplicationContext(), "Logged in Successfully!!!", Toast.LENGTH_LONG);
            Intent intent = new Intent(this, HomeActivity.class);
            startActivity(intent);
            finish();
        }
        else{
            Toast.makeText(getApplicationContext(), "Username or password doesn't exist!!!", Toast.LENGTH_LONG);
        }
    }
}