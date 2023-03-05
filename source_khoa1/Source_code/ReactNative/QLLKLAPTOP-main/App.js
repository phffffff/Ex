import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import Tabs from './views/navigation/tabs';
import {createStackNavigator} from '@react-navigation/stack';
import DetailScreen from './views/screens/DetailScreen';
import CartScreen from './views/screens/CartScreen';
import LoginScreen from './views/screens/LoginScreen';
import SignupScreen from './views/screens/SignupScreen';
import NotifyScreen from './views/screens/NotifyScreen';
import CustomerScreen from './views/screens/CustomerScreen';
import UserScreen from './views/screens/UserScreen';
const Stack = createStackNavigator();

const App = ()=>{
  return (
    <NavigationContainer>
      <Stack.Navigator screenOptions={{headerShown: false}}>
      <Stack.Screen name="LoginScreen" component={LoginScreen} />
        <Stack.Screen name="SignupScreen" component={SignupScreen} />
        <Stack.Screen name="HomeScreen" component={Tabs} />
        <Stack.Screen name="Detail" component={DetailScreen} />
        <Stack.Screen name="CartScreen" component={CartScreen} />
        <Stack.Screen name="Notification" component={NotifyScreen} />
        <Stack.Screen name="Customer" component={CustomerScreen} />
        <Stack.Screen name="UserScreen" component={UserScreen} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
export default App;