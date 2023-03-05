import React, { Component } from 'react'
import { StyleSheet, Text, View, TouchableOpacity, Image, SafeAreaView } from 'react-native'

export default class UserScreen extends Component{
    constructor(props){
        super(props)
        this.navigation = props.navigation;
        this.state = {
            data: props.route.params,
        }
    }
    gotoLogin(){
        this.navigation.navigate('LoginScreen');
    }
    render(){
        return(
            <SafeAreaView style={{backgroundColor: '#202020', paddingBottom: 50}}>
                 <View style={styles.header}>
                    <Text></Text>
                    <Text></Text>
                    <Text></Text>
                    <Image style={styles.avatar}
                    source={require('../../assets/avatar.jpg')}/>
                    <Text style={styles.name}>Doanh</Text>
                    <Text style={styles.userInfo}>Viet Nam </Text>
                </View>
                <View style={styles.body}>
                    <TouchableOpacity style={styles.item}>
                        <View style={styles.infoContent}>
                            <Text style={styles.info}>Thông Tin Cá Nhân:</Text>
                        </View>
                    </TouchableOpacity>
                    <TouchableOpacity style={styles.item}>
                        <View style={styles.infoContent}>
                            <Text style={styles.info}>Địa Chỉ: 235 Hoàng Quốc Việt-Bắc Từ Liêm-Hà Nội</Text>
                        </View>
                    </TouchableOpacity>
                    <TouchableOpacity style={styles.item}>
                        <View style={styles.infoContent}>
                            <Text style={styles.info}>Email: nguyendoanh1124@gmail.com</Text>
                        </View>
                    </TouchableOpacity>
                    <TouchableOpacity style={styles.item}>
                        <View style={styles.infoContent}>
                            <Text style={styles.info}>Điều Khoản & Chính Sách</Text>
                        </View>
                    </TouchableOpacity>
                    <View style={{alignItems:'center'}}>
                        <TouchableOpacity style={styles.Button} onPress={this.gotoLogin.bind(this)}>
                            <Text style={styles.SignUpText}>Sign Out</Text>
                        </TouchableOpacity>
                    </View>
                </View>
            </SafeAreaView>
    )
    };
}

const styles = StyleSheet.create({
    header:{
        backgroundColor: "black",
        alignItems:'center',
        bottom:0,
      },
      headerContent:{
        padding:30,
        alignItems: 'center',
        marginTop:40
      },
      avatar: {
        width: 130,
        height: 130,
        borderRadius: 63,
        borderWidth: 4,
        borderColor: "white",
        marginBottom:10,
      },
      name:{
        fontSize:20,
        color:"white",
        fontWeight:'600',
      },
      userInfo:{
        fontSize:16,
        color:"#778899",
        fontWeight:'600',
      },
      body:{
        backgroundColor: "#888888",
        height:500,
        alignItems:'center',
      },
      item:{
        flexDirection : 'row',
      },
      infoContent:{
        flex:1,
        paddingLeft:25,
        borderColor: "white",
      },
      iconContent:{
        flex:1,
        alignItems:'flex-end',
        paddingRight:5,
        borderColor: "white",
      },
      icon:{
        width:30,
        height:30,
        marginTop:20,
      },
      info:{
        fontSize:16,
        marginTop:20,
        color: "black",
        alignItems:'center'
      },
      Button:{
            width:'90%',
            color: 'black',
            height:42,
            backgroundColor: 'black',
            marginTop:20,
            display: 'flex',
            justifyContent: 'center',
            alignItems: 'center',
            position: 'absolute', 
        },
        ButtonText:{
            fontWeight: 'bold',
            fontSize: 16
        },
        SignUpText:{
            color:'white',
        },
        TextButton:{
            width:'100%',
            display:'flex',
            alignItems:'center',
            marginTop:20,
        }
})
