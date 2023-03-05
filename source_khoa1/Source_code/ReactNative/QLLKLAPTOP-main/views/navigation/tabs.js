import React from 'react';
import { createMaterialBottomTabNavigator } from '@react-navigation/material-bottom-tabs';
import HomeScreen from '../screens/HomeScreen';
import CartScreen from '../screens/CartScreen';
import NotifyScreen from '../screens/NotifyScreen';
import UserScreen from '../screens/UserScreen';
import CustomerScreen from '../screens/CustomerScreen';

import Icon from 'react-native-vector-icons/MaterialIcons';
const Tab = createMaterialBottomTabNavigator();
const Tabs =()=>{
    return(
        <Tab.Navigator 
          barStyle= {{
            backgroundColor: 'black',
            shadowOffset: {width: 0, height:-2 },
            shadowOpacity: 0.5,
            shadowRadius: 3,
            elevation: 3
          }}    
        >
          <Tab.Screen
            name="Home"
            component={HomeScreen}
            options={{
              tabBarIcon: ({color}) => (
                <Icon name="home-filled" color={color} size={24} />
              ),
            }}
          />
          <Tab.Screen
            name="Cart"
            component={CartScreen}
            options={{
            tabBarIcon: ({color}) => (
              <Icon name="shopping-cart" color={color} size={24} />
            ),
         }}
        />
        <Tab.Screen
            name="Customer"
            component={CustomerScreen}
            options={{
              tabBarIcon: ({color}) => (
                <Icon name="support" color={color} size={24} />
              ),
            }}
          />
          <Tab.Screen
            name="Notification"
            component={NotifyScreen}
            options={{
              tabBarIcon: ({color}) => (
                <Icon name="notifications" color={color} size={24} />
              ),
            }}
          />
          <Tab.Screen
            name="User"
            component={UserScreen}
            options={{
              tabBarIcon: ({color}) => (
                <Icon name="person" color={color} size={24} />
              ),
            }}
          />
    </Tab.Navigator>        
  );
};
export default Tabs;