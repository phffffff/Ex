import React,{Component} from 'react';
import {View, SafeAreaView, Image, Text, StyleSheet,FlatList,Dimensions,TouchableOpacity,ScrollView} from 'react-native';
import Tabs from '../navigation/tabs';
const width =Dimensions.get("screen").width/2-30;
const data = require('../../products/GioHang.json');
export default class DetailsScreen extends Component {
    constructor (props) {
        super(props);
        this.navigation = props.navigation;
        this.addCart=this.addCart.bind(this);
        this.state = {
            data: props.route.params,
            plus:0,
            minus:0,
            count:0,
        }
    }
    addCart(item){
        data.carts.push({ sum: item.price, Quantity: 1,name: item.name,price : item.price});
        this.navigation.navigate('Cart')
    }
  render(){
          return(
            <View style={{backgroundColor: '#202020'}}>
                <View style={styles.Header}>
                    <View >
                        <TouchableOpacity   
                            style = {styles.buttonBack} 
                            onPress = {()=>this.navigation.navigate('Home')}
                            >
                            <Image
                                source={require('../../assets/back-icon.png')}
                                resizeMode = 'contain'
                                style={{
                                    height: 30,
                                    width: 30
                                }}
                            />
                        </TouchableOpacity>
                    </View>
                </View>

                <View style={styles.detailContainer}>
                    <View
                        style={{
                             paddingTop: 10,
                             paddingLeft: 10,
                             paddingRight: 10,
                             paddingBottom: 5  
                        }}
                        >
                    <Text style = {{
                        fontSize: 22, 
                        fontWeight: 'bold',
                        color:'white'
                        }}>
                            {this.state.data.name}
                    </Text>
                </View>
                <View style={{
                    paddingTop: 5,
                    paddingLeft: 10,
                    paddingRight: 10,
                    paddingBottom: 10 
                }}>
                    <Text style={{ fontSize:18, color:'#dadada' }}>
                        {this.state.data.about}
                    </Text>
                </View>
                <View>
                    <View style={{
                        flexDirection: 'row',
                        justifyContent: 'space-between',
                        padding: 20,
                        alignItems: 'center'
                    }}>
                        <View style={{
                            flexDirection:'row',
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}>
                            <Text 
                                style={{
                                    fontSize: 18,
                                    color: '#bdbdbd'
                                }}
                                >Price:
                            </Text>
                            <Text style= {{
                                    marginLeft:18,
                                    color:'#bdbdbd',
                                    fontSize: 16,}}>
                                $ {this.state.data.price}
                            </Text>
                        </View>
                        
                        <View style ={{flexDirection: 'row', justifyContent:'flex-end'}}>
                            <TouchableOpacity onPress={()=>this.addCart(this.state.data)} style={styles.buyBtn}>
                                <Text
                                    style={{color: '#121212', fontSize: 18, fontWeight: 'bold'}}
                                >Add to cart
                                </Text>
                            </TouchableOpacity>
                        </View>
                    </View>
                </View>
            </View>
        </View>
        )
    }
}

const styles = StyleSheet.create({
    buyBtn: {
        width: 120,
        height: 40,
        backgroundColor:'#03dac5',
        borderRadius: 4,
        alignItems: 'center',
        justifyContent: 'center'
      },
    borderBtn: {
        borderColor: 'white',
        borderWidth: 1,
        borderRadius: 5,
        justifyContent: 'center',
        alignItems: 'center',
        width: 60,
        height: 40,
        marginLeft:10
      },
      borderBtnText: {
          fontWeight: 'bold', 
          fontSize: 28},
    price:{
        width: 80,
        height: 40,
        justifyContent: 'center',
        borderTopLeftRadius: 25,
        borderBottomLeftRadius: 25,
        backgroundColor:'#FF7979'
    },
    line:{
        width:25,
        height:2,
        backgroundColor:'white',
        marginBottom: 5,
        marginRight: 3,
    },
    Card:{
        backgroundColor:'white',
        height:225,
        width,
        marginHorizontal:2,
        borderRadius:10,
        marginBottom:20,
        marginLeft:10,
        marginRight:10,
    },
    detailContainer:{
        backgroundColor:'#202020',
        paddingBottom:500
    },
    imageContainer:{
        flex:0.45,
        marginTop:20,
        justifyContent:'center',
        alignItems:'center',
    },  
    Header:{
        flexDirection:'row',
        justifyContent:'space-between',
        backgroundColor:'black',    
        paddingTop: 30,
        paddingBottom: 10,
        shadowOffset: {width: 0, height:-2 },
        shadowOpacity: 0.5,
        shadowRadius: 3,
        borderRadius: 4,
        elevation: 3  
    },
    container: {
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center'
    },
    title: {
        fontSize: 40,
        fontWeight: 'bold',
        textAlign: 'center',
        marginBottom: 30
    },
    button: {
        borderWidth: 1,
        padding: 10,
        width: 150,
        alignItems: 'center'
    },
    buttonBack: {
        paddingTop: 5,
        paddingBottom: 5,
        paddingLeft: 10,
        paddingRight: 10,
        marginLeft: 10,
        backgroundColor: '#03dac5',
        shadowColor: '#03dac5',
        shadowOffset: {width: 0, height: 4},
        shadowOpacity: 0.5,
        shadowRadius: 3
    }
});