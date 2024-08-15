import { StyleSheet, Text, View, Button, Alert} from 'react-native';
import Route from './Route';
import { WebView } from 'react-native-webview';

import Boton from "./Boton"


export default function App() {
  return (
    <View style={styles.container}>
        <Route />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    justifyContent: 'center',
  },
});
