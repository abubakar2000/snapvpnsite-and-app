

package de.blinkt.openvpn.api;

import android.app.Activity;
import android.content.ComponentName;
import android.content.Context;
import android.content.Intent;
import android.content.ServiceConnection;
import android.os.Bundle;
import android.os.IBinder;
import android.os.RemoteException;
import android.widget.Toast;

import de.blinkt.openvpn.LaunchVPN;
import de.blinkt.openvpn.VpnProfile;
import de.blinkt.openvpn.core.IOpenVPNServiceInternal;
import de.blinkt.openvpn.core.OpenVPNService;
import de.blinkt.openvpn.core.ProfileManager;

public class RemoteAction extends Activity {

    public static final String EXTRA_NAME = "de.blinkt.maxcloud.api.profileName";
    private boolean mDoDisconnect;
    private IOpenVPNServiceInternal mService;
    private final ServiceConnection mConnection = new ServiceConnection() {
        @Override
        public void onServiceConnected(ComponentName className,
                                       IBinder service) {

            mService = IOpenVPNServiceInternal.Stub.asInterface(service);
            try {
                performAction();
            } catch (RemoteException e) {
                e.printStackTrace();
            }
        }

        @Override
        public void onServiceDisconnected(ComponentName arg0) {
            //mService = null;
        }

    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        ExternalAppDatabase mExtAppDb = new ExternalAppDatabase(this);
    }

    @Override
    protected void onResume() {
        super.onResume();

        Intent intent = new Intent(this, OpenVPNService.class);
        intent.setAction(OpenVPNService.START_SERVICE);
        getApplicationContext().bindService(intent, mConnection, Context.BIND_AUTO_CREATE);

    }

    private void performAction() throws RemoteException {

        if (!mService.isAllowedExternalApp(getCallingPackage())) {
            finish();
            return;
        }

        Intent intent = getIntent();
        setIntent(null);
        ComponentName component = intent.getComponent();
        if (component.getShortClassName().equals(".api.DisconnectVPN")) {
            mService.stopVPN(false);
        } else if (component.getShortClassName().equals(".api.ConnectVPN")) {
            String vpnName = intent.getStringExtra(EXTRA_NAME);
            VpnProfile profile = ProfileManager.getInstance(this).getProfileByName(vpnName);
            if (profile == null) {
                Toast.makeText(this, String.format("Vpn profile %s from API call not found", vpnName), Toast.LENGTH_LONG).show();
            } else {
                Intent startVPN = new Intent(this, LaunchVPN.class);
                startVPN.putExtra(LaunchVPN.EXTRA_KEY, profile.getUUID().toString());
                startVPN.setAction(Intent.ACTION_MAIN);
                startActivity(startVPN);
            }
        }
        finish();



    }

    @Override
    public void finish() {
        if(mService!=null) {
            mService = null;
            getApplicationContext().unbindService(mConnection);
        }
        super.finish();
    }
}
