import React, {Component} from 'react'
import { StyleSheet, TouchableOpacity, Text, TextInput, View, Button, ScrollView, Image } from 'react-native'
import Icon from 'react-native-vector-icons/MaterialIcons';
import LottieView from 'lottie-react-native';

const data=require('../../products/user.json')

export default class LoginScreen extends Component{
    constructor (props) {
            super(props);
            this.navigation = props.navigation;
            this.state = {
                data:data.user,
                check:'',
                Email:'',
                Password:''
            }
    }
    checkuser(){
        let dem=0
        
        console.log(this.state.data)
        console.log(this.state.data[0].email , this.state.data[0].password)

        console.log(this.state.Email,this.state.Password)

        for( let i=0;i<this.state.data.length;i++){
            if(this.state.data[i].email===this.state.Email&& this.state.Password===this.state.data[i].password){
                this.navigation.navigate('HomeScreen',this.state.data[i]);
                dem++
            }
            // else if(this.state.Email===''||this.state.Password===''){
                
            //     alert("Tài Khoản Hoặc Mật Khẩu Không Được Trống")
            //     this.setState({check:alert});
            // }
            // else{
            //     alert("Tài Khoản Hoặc Mật Khẩu Sai")
            //     this.setState({check:alert});
            // }
        }
        if(dem===0){
                alert("Tài khoản hoặc mật khẩu sai!")
                this.setState({check:alert});
        }
    } 
    render(){
    return (
        <View style={styles.mainView}>
            <View style={styles.TopView}>
                <LottieView source={require('../../assets/computer.json')} autoPlay loop />
            </View>
            <ScrollView style={styles.BottomView}>
                <Text style={styles.Headding}>
                    Welcome{'\n'}
                    back
                </Text>
                <View style={styles.FormView}>
                    <TextInput placeholder={"Username"} 
                    placeholderTextColor={"white"} 
                    style= {styles.TextInput} 
                    value={this.state.Email} 
                    onChangeText={(value)=>{this.setState({Email:value})}} />
                    <TextInput placeholder={"Password"} 
                    placeholderTextColor={"white"} 
                    secureTextEntry={true} 
                    style={styles.TextInput} 
                    value={this.state.Password} 
                    onChangeText={(value)=>{this.setState({Password:value})}}/>
                    <TouchableOpacity style={styles.Button} onPress={this.checkuser.bind(this)}>
                        <Text style={styles.ButtonText}>Sign In</Text>
                    </TouchableOpacity>
                </View>
                    <TouchableOpacity style={styles.TextButton} onPress={()=>this.navigation.navigate('SignupScreen')}>
                        <Text style={styles.SignUpText}>Don't have an account yet? Sign Up</Text>
                    </TouchableOpacity>
            </ScrollView>
        </View>
    )
  }
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
        height:'30%',
        display:'flex',
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: 'white',
    },
    BottomView:{
        width: '100%',
        height:'70%',
        backgroundColor: '#000'
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
})