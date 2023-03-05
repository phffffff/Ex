import React, {Component} from 'react';

import {
  StyleSheet,
  Text,
  View,
  TextInput,
  TouchableOpacity,
  Image,
  FlatList,
  ScrollView,
} from 'react-native';
var data = require('../../products/GioHang.json');
export default class CartScreen extends Component {
  constructor(props) {
    super(props);
    this.navigation = props.navigation;
    this.backHome = this.backHome.bind(this);
    this.decreaseQty=this.decreaseQty.bind(this)
    this.increaseQty=this.increaseQty.bind(this)
    this.removeCartItem=this.removeCartItem.bind(this);
    this.totalCart = this.totalCart.bind(this);
    this.state = {
      data: props.route.params,
      id: 1,
      plus:0,
      minus:0,
      count:0,
      Total: 0,
      label:''
    };
    console.log(this.state.data);
  }

  removeCartItem(name){
    for(let i=0;i<data.carts.length;i++){
      if(data.carts[i].name === name){ 
        data.carts.splice(i,1);     
      }
    }  
    this.navigation.navigate('Cart',data.carts)
    this.navigation.navigate('Cart')
  }
  totalCart(){
    let total = 0;
      for (let i = 0; i < data.carts.length; i++) {
        total = total + data.carts[i].sum; 
        this.setState({Total : total})     
      }  
  }

  decreaseQty(name){
    var price=0;
    for (let i = 0; i < data.carts.length; i++) {
      price=data.carts[i].price;
      if (data.carts[i].name === name) {
        if(data.carts[i].Quantity==1){
        }else{
          data.carts[i].Quantity=data.carts[i].Quantity-1;
          data.carts[i].sum=data.carts[i].Quantity*price;
        }
      }
    }
    this.totalCart();
    this.navigation.navigate('Cart',data.carts)
    this.navigation.navigate('Cart')
  }
  increaseQty(name){
    var price=0;
    for (let i = 0; i < data.carts.length; i++) {
      price=data.carts[i].price;
      if (data.carts[i].name === name) {
        data.carts[i].Quantity=data.carts[i].Quantity+1;
        data.carts[i].sum=data.carts[i].Quantity*price;
      }
    }
    this.totalCart();
    this.navigation.navigate('Cart',data.carts)
    this.navigation.navigate('Cart')
    
  }
  backHome() {
    this.navigation.goBack();
  }
  render() {
    for(let i=0;i<data.carts.length-1;i++){
      for(let j=i+1;j<data.carts.length;j++){
        if(data.carts[i].name == data.carts[j].name){
          data.carts.pop(data.carts[j]);
        }
      }
    }
    const RenderItem=({carts})=> {

      return (
        <View style={styles.cart}>
          <TouchableOpacity onPress={()=>this.removeCartItem(carts.name)} 
              style={{  
                paddingTop: 8,
                paddingBottom: 8,
                paddingLeft: 10,
                paddingRight: 10,     
              }}
            >
              <Text style={{   
                fontWeight: 'bold',
                color: '#bb86fc',  
                fontSize: 18
              }}>X</Text>
            </TouchableOpacity>
          <View style={styles.title}>
            <Text style={{fontSize: 18, color:'#dadada', fontWeight: 'bold'}}>{carts.name}</Text>
          </View>
          <View style={{
            flexDirection: 'column',
            flex: 3,
            justifyContent: 'center',
            alignItems: 'center'
          }}>
            <View style={{
              flexDirection: 'row',
              // padding: 10,
              marginBottom: 10
            }}>
              <TouchableOpacity 
                style={{
                  color: '#dadada',
                  padding: 10,
                  }} 
                onPress={()=> this.decreaseQty(carts.name)}
                > 
                  <Text style={{color: '#dadada',
                  fontWeight:'bold',
                  fontSize: 16}} >-</Text>
              </TouchableOpacity>
              <Text style={{
                  color: '#dadada',
                  padding: 10,
                  fontWeight:'bold',
                  fontSize: 16
              }}>{carts.Quantity}</Text>
              <TouchableOpacity 
                style={{
                  color: '#dadada',
                  padding: 10
                  }} 
                onPress={()=> this.increaseQty(carts.name)}
                > 
                  <Text style={{color: '#dadada', fontWeight:'bold', fontSize: 16}} >+</Text>
              </TouchableOpacity>
            </View>
            <View>
              <Text style={{color:'#bdbdbd'}}>${carts.sum.toFixed(2)}</Text>
            </View>   
          </View>
          <View style={{
            flex: 1, 
            justifyContent: 'center',
            alignItems: 'center',
          }}>
          </View>
        </View>
      );
    }

    
    
    return (
      <View style={styles.container}>
        <View style={styles.Header}>
          <View style={{flex: 1, padding: 10, justifyContent: 'center', alignItems: 'center'}}>
            <Text style={{color: 'white', fontSize: 16, fontWeight: 'bold'}}>Cart</Text>
          </View>
        </View>

          <View style={styles.products}>
            <FlatList
              data={data.carts}
              renderItem={({item}) => <RenderItem carts={item} />}
            />
          </View>
          
          <View style={{
              flexDirection: 'row',
              justifyContent: 'space-between',
              alignItems: 'center',
              padding: 10,
              paddingLeft: 20,
              margin: 10,
              backgroundColor: '#2a2a2a',
              marginBottom: 20,
              elevation: 2,
              shadowColor: 'black',
              shadowOffset: {width: -4, height: 6},
              shadowOpacity: 0.5,
              shadowRadius: 3,
              borderRadius: 4,
          }}>
              <View style={{}}>
                <Text style={{fontWeight:'bold', fontSize: 16, color: '#dadada'}}>Total:</Text>
              </View> 
              <View><Text style={{fontWeight:'bold', fontSize: 16, color: '#dadada'}}>{this.state.Total.toFixed(2)}</Text></View>
              <View style={styles.rightBottom}>                
                <TouchableOpacity style={{
                    backgroundColor: '#03dac5',
                    borderRadius: 4,
                    shadowColor: '#03dac5',
                    shadowOffset: {width: 0, height: 4},
                    shadowOpacity: 0.5,
                    shadowRadius: 3,
                    paddingTop: 10,
                    paddingBottom: 10,
                    paddingLeft: 10,
                    paddingRight: 10,
                }} 
                  onPress={this.totalCart}
                  >
                  <Text 
                    style={{
                      fontSize: 16, 
                      fontWeight:'bold'
                    }}>
                    Check Out</Text>
                </TouchableOpacity>
              </View>
            </View>
          </View>
      )
    }
  }

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#202020', 
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
  cart: {
    margin: 20,
    marginBottom: 5,
    marginTop: 15,
    padding: 10,
    flexDirection: 'row',
    backgroundColor: "#2a2a2a",
    justifyContent: 'space-between',
    alignItems: 'center',
    shadowColor: 'black',
    shadowOffset: {width: -4, height: 6},
    shadowOpacity: 0.5,
    shadowRadius: 3,
    borderRadius: 4,
  },
  title: {
    flex: 7,
    marginLeft: 10,
    marginRight: 25,
    justifyContent: 'space-between',
  },
  quantity:{
    flexDirection: 'row',
    width: 120,
    height: 30,
    alignItems: 'center',
    marginLeft: 20,
  },
  textQuantity: {
    fontSize: 20,
    width: 40,
    textAlign: 'center',
    color: '#5B14F5',
  },
  price: {
    flex: 1.3,
    marginRight: 5,
    alignItems: 'center',
    justifyContent: 'space-between'
  },
  products: {
    height:500,
  },
  bottom: {
    flexDirection: 'row',
    marginTop: 5,
    height:200,
  },
  button: {
    backgroundColor: 'black',
    height: 30,
    paddingTop: 5,
    paddingBottom: 10,
    paddingLeft: 15,
    paddingRight: 15,
    margin: 10
  },
});
