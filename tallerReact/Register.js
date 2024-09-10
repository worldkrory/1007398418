// components/Register.js
import React, { useState } from 'react';
import { View, TextInput, Button, Alert } from 'react-native';
import { registerUser } from '../services/api';

const Register = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleRegister = async () => {
    try {
      const user = await registerUser(email, password);
      Alert.alert('Usuario registrado exitosamente!', user.message);
    } catch (error) {
      Alert.alert('Error al registrar el usuario', JSON.stringify(error));
    }
  };

  return (
    <View>
      <TextInput placeholder="Email" value={email} onChangeText={setEmail} />
      <TextInput placeholder="Contraseña" value={password} onChangeText={setPassword} secureTextEntry />
      <Button title="Registrar" onPress={handleRegister} />
    </View>
  );
};

export default Register;
