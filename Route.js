import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import { NavigationContainer } from "@react-navigation/native";
import Image from "./views/Image";
import Modal from "./views/Modal";
import Table from "./views/Table";
import Animation from "./views/Animation";

const Tab = createBottomTabNavigator();

export default function Route() {
    return (
        <NavigationContainer>
            <Tab.Navigator>
                <Tab.Screen name="Table" component={Table} />
                <Tab.Screen name="Image" component={Image} />
                <Tab.Screen name="Modal" component={Modal} />
                <Tab.Screen name="Animation" component={Animation} />
            </Tab.Navigator>
        </NavigationContainer>
    );
}