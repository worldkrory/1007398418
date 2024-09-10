// components/UserList.js
import React, { useState, useEffect } from 'react';
import { View, Text, FlatList } from 'react-native';
import { fetchUsers } from '../services/api';

const UserList = ({ token }) => {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    const loadUsers = async () => {
      try {
        const usersData = await fetchUsers(token);
        setUsers(usersData);
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    };

    loadUsers();
  }, [token]);

  return (
    <View>
      <FlatList
        data={users}
        keyExtractor={(item) => item.id.toString()}
        renderItem={({ item }) => (
          <Text>{item.email}</Text>
        )}
      />
    </View>
  );
};

export default UserList;
