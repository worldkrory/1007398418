// App.js
import React, { useState } from 'react';
import { View } from 'react-native';
import Register from './components/Register';
import UserList from './components/UserList';

const App = () => {
  const [token, setToken] = useState(''); // Si usas autenticación, maneja el token

  return (
    <View>
      <Register />
      {token && <UserList token={token} />}
    </View>
  );
};

export default App;
