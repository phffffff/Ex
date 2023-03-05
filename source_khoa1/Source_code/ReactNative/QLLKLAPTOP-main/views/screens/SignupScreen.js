import React from 'react'
import { StyleSheet, TouchableOpacity, Text, TextInput, View, Button, ScrollView, Image } from 'react-native'
import LottieView from 'lottie-react-native';

const data=require('../../products/user.json')
//import { firebase } from '../../Firebase/firebase';
const SignupScreen = ({navigation}) => {
    function navigate(){
        navigation.navigate('LoginScreen');
    }
    return (
        <View style={styles.mainView}>
            <View style={styles.TopView}>
                <LottieView source={require('../../assets/computer.json')} autoPlay loop />
            </View>
            <ScrollView style={styles.BottomView}>
                <Text style={styles.Headding}>
                    Create Account
                </Text>
                <View style={styles.FormView}>
                <TextInput placeholder={"Full Name"} placeholderTextColor={"white"} style={styles.TextInput} onChangeText={(value)=> email=value} />
                <TextInput placeholder={"Email Adress"} placeholderTextColor={"white"} style={styles.TextInput} onChangeText={(value)=> email=value} />
                <TextInput placeholder={"Password"} placeholderTextColor={"white"} secureTextEntry={true} style={styles.TextInput} onChangeText={(value)=> Password=value}/>
                <TextInput placeholder={"Retype Password"} placeholderTextColor={"white"} secureTextEntry={true} style={styles.TextInput} onChangeText={(value)=> Password=value}/>
                <TouchableOpacity style={styles.Button} onPress={() => navigation.navigate('LoginScreen')}>
                    <Text style={styles.ButtonText}>Create Account</Text>
                </TouchableOpacity>
                </View>
            </ScrollView>
        </View>
    )
}


const styles = StyleSheet.create({
    mainView:{
        marginTop:40,
        flex:1,
        flexDirection: 'column',
        justifyContent: 'center',
        alignItems: 'center'
    },
    TopView:{
        width: '100%',
        height:'20%',
        display:'flex',
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: 'white',
    },
    BottomView:{
        width: '100%',
        height:'80%',
        backgroundColor: '#000',
        
    },
    Imagest:{
        width: '100%',
        backgroundColor: 'white',
        resizeMode: 'contain'
    },
    Headding:{
        color: '#fff',
        fontSize: 32,
        fontWeight: 'bold',
        marginLeft:30,
        marginTop:60
    },
    FormView:{
        width: '100%',
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        marginTop: 40
    },
    TextInput:{
        width: '90%',
        borderWidth: 1,
        borderColor:'#fff',
        height: 42,
        paddingLeft:5,
        marginTop:20,
        color: '#fff',
        borderRadius: 4
    },
    Button:{
        width:'90%',
        color: '#000',
        height:42,
        backgroundColor: '#fff',
        marginTop:20,
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 4
    },
    ButtonText:{
        fontWeight: 'bold',
        fontSize: 18
    },
    SignUpText:{
        color:'gray',
    },
    TextButton:{
        width:'100%',
        display:'flex',
        alignItems:'center',
        marginTop:20,
        
    }
});    
export default SignupScreen;