import React, {Component} from 'react';
import {
  StyleSheet,
  Text,
  View,
  TextInput,
  TouchableOpacity,
  FlatList,
  Image
} from 'react-native';
const data=require("../../products/notify.json")

export default class NotifyScreen extends Component{
    constructor(props){
        super(props)
        this.navigation= props.navigation
        this.removeCartItem=this.removeCartItem.bind(this);
        this.state={
            data:data.notifies
        };
    }
    removeCartItem(id){
      for(let i=0;i<data.notifies.length;i++){
        if(data.notifies[i].id === id){ 
          data.notifies.splice(i,1);     
        }
      }
      //  this.navigation.navigate('Notify',data.notifies)
      // this.navigation.navigate('Notify')
    }  
    deleteItemById = id => {
      const filteredData = this.state.data.filter(item => item.id !== id);
      this.setState({ data: filteredData });
    }
    render(){
        return(
            <View style={styles.container}>
                <Text></Text>
                <Text></Text>
                
            <FlatList 
              style={styles.notificationList} 
              enableEmptySections={true}
              data={this.state.data}
              removeCartItem={this.removeCartItem()}
              keyExtractor= {(item) => {
                return item.id.toString();
              }}
              renderItem={({item}) => {
                return (
                  <TouchableOpacity /*onPress={()=>this.navigation.navigate('NotifyDetailScreen')}*/>
                      <View style={styles.notificationBox}>
                            <Image style={styles.icon}
                            source={{uri: 'https://img.icons8.com/ios/50/000000/computer-chat.png'}}/>
                            <Text style={styles.description}>{item.about}</Text>
                            <TouchableOpacity onPress={()=>this.deleteItemById(item.id)}
                            style={{
                              paddingBottom:5,
                              paddingRight:5,  
                              
                              }}>
                              <Text style={{   
                                    fontWeight: 'bold',
                                    color: '#bb86fc',  
                                    fontSize: 18,
                              }}>X</Text>
                            </TouchableOpacity>
                        </View>
                    </TouchableOpacity>
                )}}/>
            </View>
        )
    }
}

const styles = StyleSheet.create({
    container:{
      backgroundColor: '#808080',
      paddingBottom: 50
      },
      notificationList:{
        width:'100%',
        marginTop:20,
        padding:10,
        backgroundColor: '#808080',
      },
      notificationBox: {
        padding:20,
        marginBottom:15,
        backgroundColor:'white',
        // marginBottom: 20,
        elevation: 2,
        shadowColor: 'black',
        shadowOffset: {width: -4, height: 6},
        shadowOpacity: 0.5,
        shadowRadius: 3,
        borderRadius: 4,
        flexDirection: 'row'
      },
      icon:{
        width:35,
        height:35
      },
      description:{
        width:'80%',
        fontSize:17.5,
        color: "black",
        marginLeft:10,
        marginRight: 10
      }
})
